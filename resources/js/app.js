document.getElementById('updateForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const especie = document.getElementById('especie').value.trim();
    const subespecie = document.getElementById('subespecie').value.trim();
    const vento = document.getElementById('vento').value.trim();
    const numeroEspecies = document.getElementById('numero-especies').value.trim();
    const bebes = document.getElementById('bebes').value.trim();
    const empresaBarco = document.getElementById('empresa-barco').value.trim();
    const comportamento = document.getElementById('comportamento').value.trim();
    const dataInicio = document.getElementById('data-inicio').value;
    const horaInicio = document.getElementById('hora-inicio').value;
    const horaFim = document.getElementById('hora-fim').value;

    console.log('dataInicio :', dataInicio, 'horaInicio:', horaInicio, 'horaFim:', horaFim);

    try {
        let sightingData = [];
        let nextUrl = 'https://wave-labs.org/api/sighting';

        while (nextUrl) {
            const response = await fetch(nextUrl);
            if (!response.ok) {
                throw new Error(`Erro ao buscar os dados de sighting: ${response.statusText}`);
            }

            const pageData = await response.json();
            sightingData = sightingData.concat(pageData.data);
            nextUrl = pageData.links?.next || null;
        }

        console.log('Todos os Dados de Sighting:', sightingData);

        function horaParaMinutos(hora) {
            const [h, m, s] = hora.split(':').map(Number);
            return h * 60 + m + (s ? s / 60 : 0); 
        }

        const filtrados = sightingData.filter(item => {
            const [dateRegistada, timeRegistado] = item.date.split(' '); // Divide a string em duas partes: data e hora

            console.log('Data:', dateRegistada, 'Hora:', timeRegistado);

            const minutosRegistados = horaParaMinutos(timeRegistado);
            const minutosInicio = horaInicio ? horaParaMinutos(horaInicio) : null;
            const minutosFim = horaFim ? horaParaMinutos(horaFim) : null;

            return (
                (subespecie === '0' || subespecie === '' || (item.creature?.name?.toString() === subespecie)) &&
                (vento === '0' || vento === '' || item.beaufort_scale?.desc?.pt === vento) &&
                (numeroEspecies === '0' || numeroEspecies === '' || item.group_size?.toString() === numeroEspecies) &&
                (bebes === '0' || bebes === '' || item.calves?.toString() === bebes) &&
                (empresaBarco === '0' || empresaBarco === '' || item.vehicle?.vehicle?.pt?.toString() === empresaBarco) &&
                (comportamento === '0' || comportamento === '' || item.behaviour?.behaviour?.pt.toString() === comportamento) &&
                (dataInicio === '' || dateRegistada === dataInicio) &&
                (minutosInicio === null || minutosRegistados >= minutosInicio) &&
                (minutosFim === null || minutosRegistados <= minutosFim)
            );
        });

        console.log('Filtrados:', filtrados);


        const resultadosElement = document.getElementById('resultados');
        resultadosElement.innerHTML = '';

        if (filtrados.length > 0) {
            for (const item of filtrados) {
                const li = document.createElement('li');
                li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-start');
                li.textContent = `${item.creature?.name || 'N/A'} ` +
                                 `Vento: ${item.beaufort_scale?.desc?.pt || 'N/A'}, ` +
                                 `Grupo: ${item.group_size || 'N/A'}, ` +
                                 `Bebês: ${item.calves || 'N/A'}, ` +
                                 `Data: ${item.date || 'N/A'}, `
                        const fotoLink = document.createElement('a');
                        fotoLink.textContent = 'Ver Foto';
                        fotoLink.href = `/analisaFoto/${item.creature?.id}`;
                        fotoLink.target = '_blank'; 
                        fotoLink.classList.add('btn', 'btn-primary', 'btn-sm');
                        fotoLink.style.marginLeft = '90%';
                        fotoLink.style.marginTop = '20%';


                        li.appendChild(fotoLink);
                        resultadosElement.appendChild(li);
            }
        } else {
            resultadosElement.innerHTML = '<li>Nenhum resultado encontrado.</li>';
        }
    } catch (error) {
        console.error('Erro durante o pedido ou processamento:', error);
        alert(`Erro: ${error.message}`);
    }
});

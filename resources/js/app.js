import './bootstrap';
console.log('App JS is working');
window.filtrarResultados = function()  {
    const especie = document.getElementById('especie').value;
    const subespecie = document.getElementById('subespecie').value;
    const vento = document.getElementById('vento').value;
    const numeroEspecies = document.getElementById('numero-especies').value;
    const bebes = document.getElementById('bebes').value;
    const dataHora = document.getElementById('data-hora').value;
    const empresaBarco = document.getElementById('empresa-barco').value;
    const comportamento = document.getElementById('comportamento').value;
    const dataInicio = document.getElementById("data-inicio").value;
    const horaInicio = document.getElementById("hora-inicio").value;
    const horaFim = document.getElementById("hora-fim").value;

    const resultados = [
        { especie: especie, subespecie:subespecie, vento: vento, numeroEspecies: numeroEspecies, bebes: bebes, dataHora: dataHora, empresaBarco: empresaBarco, comportamento: comportamento, dataInicio: dataInicio, horaInicio: horaInicio, }
    ];
    console.log(resultados);
    const filtrados = resultados.filter(item => {
        return (
            (!especie || item.especie.toLowerCase() === especie.toLowerCase()) &&
            (!subespecie || item.subespecie.toLowerCase() === subespecie.toLowerCase()) &&
            (!numeroEspecies || item.numeroEspecies.toLowerCase() === numeroEspecies.toLowerCase()) &&
            (!numeroEspecies || item.numeroEspecies.toLowerCase() === numeroEspecies.toLowerCase()) &&
            (!bebes || item.bebes.toLowerCase() === bebes.toLowerCase()) &&
            (!dataHora || item.dataHora.toLowerCase() === dataHora.toLowerCase()) &&
            (!empresaBarco || item.empresaBarco.toLowerCase() === empresaBarco.toLowerCase()) &&
            (!comportamento || item.comportamento.toLowerCase() === comportamento.toLowerCase()) &&
            (!vento || item.vento.toLowerCase().includes(vento.toLowerCase())) &&
            (!dataInicio || item.dataHora >= dataInicio) &&
            (!horaInicio || item.dataHora >= horaInicio) &&
            (!horaFim || item.dataHora <= horaFim)
        );
    });

    const resultadosElement = document.getElementById('resultados');
    resultadosElement.innerHTML = '';

    if (filtrados.length > 0) {
        filtrados.forEach(item => {
            
            const li = document.createElement('li');
            li.textContent = `${item.especie} (${item.subespecie}) - ${item.data} - ${item.empresaBarco}`;
            resultadosElement.appendChild(li);
        });
    } else {
        resultadosElement.innerHTML = '<li>Nenhum resultado encontrado.</li>';
    }
}
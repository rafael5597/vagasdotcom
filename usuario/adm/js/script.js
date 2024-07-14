document.addEventListener('DOMContentLoaded', function() {
    // Exemplo de como adicionar vagas dinamicamente
    let vagas = [
        {
            titulo: 'Desenvolvedor Frontend',
            empresa: 'Tech Solutions',
            descricao: 'Desenvolvimento de interfaces web usando React e Bootstrap.'
        },
        {
            titulo: 'Analista de Dados',
            empresa: 'DataCorp',
            descricao: 'Análise de grandes volumes de dados e geração de relatórios.'
        }
    ];

    let vagasList = document.getElementById('vagas-list');
    vagas.forEach(vaga => {
        let vagaElement = document.createElement('div');
        vagaElement.className = 'col-md-4';
        vagaElement.innerHTML = `
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">${vaga.titulo}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">${vaga.empresa}</h6>
                    <p class="card-text">${vaga.descricao}</p>
                    <a href="#" class="btn btn-primary">Candidatar-se</a>
                </div>
            </div>
        `;
        vagasList.appendChild(vagaElement);
    });
});

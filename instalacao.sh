

# Verifica se o comando 'make' está disponível no PATH.
if command -v make >/dev/null 2>&1; then
    # Se 'make' estiver instalado, exibe uma mensagem e executa o alvo 'run' do Makefile.
    echo "'make' encontrado. Utilizando o Makefile para iniciar o servidor."
    make run
else
    # Caso 'make' não esteja instalado, exibe uma mensagem e utiliza o script alternativo.
    echo "'make' não encontrado. Utilizando script alternativo para instalar Composer e iniciar o servidor PHP."

    # Verifica se o arquivo 'bin/alternativo.sh' existe e tem permissão de execução.
    if [ -x bin/alternativo.sh ]; then
        # Se o arquivo for executável, executa-o diretamente.
        ./bin/alternativo.sh
    else
        # Caso contrário, executa o script utilizando o interpretador 'sh'.
        sh bin/alternativo.sh
    fi
fi

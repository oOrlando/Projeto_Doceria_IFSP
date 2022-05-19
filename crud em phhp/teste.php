<?php
    require_once 'classContato.php';
    require_once 'classPDOconexao.php';
    require_once 'iDaiModeCrud.php';
    require_once 'classDaoContato.php';
    

    header("Content-Type: text/html; charset=utf-8",true);
    
    function __spl_autoload_register( $classe )
    {
        if(file_exists( "{$classe}.php" ))
        {
            include_once "{$classe}.php";
        }
        else
        {
            echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
        }
    }
    
    // Nesta etapa criamos um objeto de contato e logo em seguida vamos fazer estes dados persistentes no banco de dados
    $contato1 = new Contato( "Alex Barba", "t@teste.com.br", "44" );

    // Então primeiro criamos um novo objeto DAO
    $PersitenciaContato1 = new DaoContato();
    
    // Para persistencia de dados do objeto contato, usamos o método create passando o nosso objeto de contato como parâmetro
    if( $PersitenciaContato1 -> create( $contato1 ))
    {
        echo 'dados inseridos';
    }

    // Agora podemos testar outra funcionalidade, recuperar os dados persistidos no dados no banco para um novo objeto de contatos, usamos o método read do nosso DAO.
    // O var_dump está sendo usado apenas para facilitar a visualização do objeto sem precisar inserir mais códigos
    var_dump( $PersitenciaContato1 -> read( 1 ));

    //Note que poderíamos criar um novo objeto com os dados de contato apenas desta forma:
    $contato2 = $PersitenciaContato1 -> read( 1 );

    // O número 1, indica o ID do registro no banco de dados.
    // Agora para atualizar os dados, primeiro “setamos” os novos valores no objeto de contato com os dados carregados.
    // Vamos usar o primeiro objeto identificado como $contato1:
    $contato1 -> setNome("João Silva");
    $contato1 -> setEmail("joao@teste.com.br");

    // Então chamamos o método de update do nosso DAO passando o objeto de contato.
    if($PersitenciaContato1 -> update( $contato1 ))
    {
        echo 'dados atualizados no banco';
    }
    
    //Vamos conferir a atualização realizada com o método read do nosso DAO
    var_dump( $PersitenciaContato1 -> read( 1 ));
    
    //para excluirmos usamos o método delete do nosso DAO, informando o ID como parâmetro
    if( $PersitenciaContato1 -> delete( 1 ))
    {
        echo 'dados excluídos do banco';
    }
?>
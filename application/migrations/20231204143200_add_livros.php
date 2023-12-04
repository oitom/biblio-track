<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Livros extends CI_Migration {

  public function up()
  {
    $data = array(
      array(
        'titulo' => 'Os Sete',
        'descricao' => 'Lançado de forma independente em 2000, Os Sete, de André Vianco, conquistou uma multidão de fãs e se tornou um best-seller, vendendo mais de 100 mil exemplares',
        'autor' => 'André Vianco',
        'n_paginas' => '349',
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-12-04',
      ),
      array(
        'titulo' => 'O Senhor dos Anéis',
        'descricao' => 'Uma épica trilogia de fantasia escrita por J.R.R. Tolkien.',
        'autor' => 'J.R.R. Tolkien',
        'n_paginas' => 1178,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-12-04',
      ),
      array(
        'titulo' => '1984',
        'descricao' => 'Uma distopia clássica escrita por George Orwell.',
        'autor' => 'George Orwell',
        'n_paginas' => 328,
        'capa' => 'capa_padrao.png', 
        'data_cadastro' => '2023-06-08',
      ),
      array(
        'titulo' => 'A Culpa é das Estrelas',
        'descricao' => 'Um romance emocionante escrito por John Green.',
        'autor' => 'John Green',
        'n_paginas' => 313,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-01-10',
      ),
      array(
        'titulo' => 'A Revolução dos Bichos',
        'descricao' => 'Uma sátira política escrita por George Orwell.',
        'autor' => 'George Orwell',
        'n_paginas' => 141,
        'capa' => 'capa_padrao.png', 
        'data_cadastro' => '2023-08-17',
      ),
      array(
        'titulo' => 'Dom Quixote',
        'descricao' => 'Um clássico da literatura espanhola escrito por Miguel de Cervantes.',
        'autor' => 'Miguel de Cervantes',
        'n_paginas' => 863,
        'capa' => 'capa_padrao.png', 
        'data_cadastro' => '2023-01-16',
      ),
      array(
        'titulo' => 'Cem Anos de Solidão',
        'descricao' => 'Um clássico da literatura latino-americana escrito por Gabriel García Márquez.',
        'autor' => 'Gabriel García Márquez',
        'n_paginas' => 417,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-05-30',
      ),
      array(
        'titulo' => 'O Pequeno Príncipe',
        'descricao' => 'Uma história encantadora escrita por Antoine de Saint-Exupéry.',
        'autor' => 'Antoine de Saint-Exupéry',
        'n_paginas' => 96,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-04-06',
      ),
      array(
        'titulo' => 'Crime e Castigo',
        'descricao' => 'Um dos grandes clássicos da literatura russa escrito por Fiódor Dostoiévski.',
        'autor' => 'Fiódor Dostoiévski',
        'n_paginas' => 551,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-01-25',
      ),
      array(
        'titulo' => 'Orgulho e Preconceito',
        'descricao' => 'Um clássico da literatura inglesa escrito por Jane Austen.',
        'autor' => 'Jane Austen',
        'n_paginas' => 279,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-01-28',
      ),
      array(
        'titulo' => 'A Metamorfose',
        'descricao' => 'Uma novela surrealista escrita por Franz Kafka.',
        'autor' => 'Franz Kafka',
        'n_paginas' => 55,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-10-15',
      ),
      array(
        'titulo' => 'A Revolta de Atlas',
        'descricao' => 'Um romance filosófico escrito por Ayn Rand.',
        'autor' => 'Ayn Rand',
        'n_paginas' => 1088,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-10-10',
      ),
      array(
        'titulo' => 'O Nome do Vento',
        'descricao' => 'Um romance de fantasia escrito por Patrick Rothfuss.',
        'autor' => 'Patrick Rothfuss',
        'n_paginas' => 662,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-03-27',
      ),
      array(
        'titulo' => 'A Guerra dos Tronos',
        'descricao' => 'O primeiro livro da série "As Crônicas de Gelo e Fogo" escrita por George R.R. Martin.',
        'autor' => 'George R.R. Martin',
        'n_paginas' => 592,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-08-06', 
      ),
      array(
        'titulo' => 'Duna',
        'descricao' => 'Um clássico da ficção científica escrito por Frank Herbert.',
        'autor' => 'Frank Herbert',
        'n_paginas' => 592,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-08-01', 
      ),
      array(
        'titulo' => 'O Silmarillion',
        'descricao' => 'Um livro póstumo do escritor britânico J.R.R. Tolkien, editado e publicado pelo seu filho, Christopher Tolkien.',
        'autor' => 'J.R.R. Tolkien',
        'n_paginas' => 365,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-09-15',
      ),
      array(
        'titulo' => 'O Alquimista',
        'descricao' => 'Um romance do autor brasileiro Paulo Coelho que explora temas como a busca pessoal e a realização dos sonhos.',
        'autor' => 'Paulo Coelho',
        'n_paginas' => 163,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-01-01',
      ),
      array(
        'titulo' => 'O Senhor das Moscas',
        'descricao' => 'Um clássico da literatura escrita por William Golding, que explora temas como sociedade e natureza humana.',
        'autor' => 'William Golding',
        'n_paginas' => 208,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-09-17',
      ),
      array(
        'titulo' => 'A Sangue Frio',
        'descricao' => 'Um "romance não-ficcional" escrito por Truman Capote, que relata um brutal assassinato em uma pequena cidade.',
        'autor' => 'Truman Capote',
        'n_paginas' => 343,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-01-17',
      ),
      array(
        'titulo' => 'O Hobbit',
        'descricao' => 'Um clássico da literatura de fantasia escrito por J.R.R. Tolkien.',
        'autor' => 'J.R.R. Tolkien',
        'n_paginas' => 310,
        'capa' => 'capa_padrao.png',
        'data_cadastro' => '2023-09-21',
      ),
    );
    $this->db->insert_batch('livros', $data);
  }

  public function down()
  {
    $this->db->query('TRUNCATE TABLE livros');
  }
}
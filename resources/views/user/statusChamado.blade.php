<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Chamados</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #007bff, #6610f2);
            margin: 0;
            padding: 0;
            color: #fff;
        }

        /* Cabeçalho */
        .header {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            backdrop-filter: blur(10px);
        }

        /* Container principal */
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            color: #333;
            overflow-x: auto;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Tabela de chamados */
        table {
    max-width: 100%;
    margin-top: 15px;
    table-layout: fixed; /* Definir layout fixo para a tabela */
    text-align: center;
    width: 100%;
   
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    width: 2rem;
}

td {
    font-size: 1.4rem;
    max-width: 22rem;
    padding: 0rem 0.8rem;
    overflow: hidden;
    text-overflow: ellipsis; /* Para garantir que o texto não estoure, ele será cortado com '...' */
    
}

th {
    background: #007bff;
    color: #fff;
}

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .status.open {
            background-color: #d9534f;
            color: #fff;
        }

        .status.closed {
            background-color: #28a745;
            color: #fff;
        }

        /* Rodapé */
        .footer {
            text-align: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        } .btn-voltar {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 15px;
    display: block;
    width: fit-content;
}

.btn-voltar:hover {
    background-color: #0056b3;
}  .erro{
    color: red;
}

    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <div class="header">📞 Painel de Chamados</div>

    <div class="container">



        <p> User_id: {{ session('id')}} </p>

     
        @foreach($data as $user)

        @if($user->protocolo === $protocolo)
 

        <h2>🔍 Chamado Atual </h2>
{{-- 
        @dd($user->created_at) --}}

            <div><strong>📎 Protocolo:</strong> {{ $user->protocolo }}  </div>
            <div><strong>📝 Descrição:</strong> {{ $user->description }} </div>
            <div><strong>⏳ Prazo da Operadora:</strong> <span class="status open"> 
            
            <?php 
             echo date('d/m/y', strtotime('+2 days', strtotime($user->created_at)));
            ?>
                
            </span></div>
            <div><strong>📅 Data de Abertura:</strong> 
                <?php
                $dataFormat = DateTime::createFromFormat('Y-m-d H:i:s', $user->created_at);
                echo $dataFormat ? $dataFormat->format('d/m/Y H:i:s') : 'Data inválida';
                ?>
             
            <div><strong>📢 Status:</strong> <span class="status open">
                Chamado em Aberto</span></div>

        
        @else 

        <p class="erro"> Protocolo incorreto. </p>

        @endif

        @endforeach

          

                
                  

        {{-- <h2>📜 Histórico de Chamados  </h2>

    
        <table>
            <thead>
                <tr>
                    <th>Protocolo</th>
                    <th>Motivo</th>
                    <th>Data</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Protocolo  </td>
                    <td>Description</td>
                    <td>Created </td>

                
                </tr>
               
            </tbody>
        </table> --}}

  
       
 

        <button class="btn-voltar" onclick="history.back()">⬅️ Voltar</button>

    </div>

 



    </div>



    <!-- Rodapé -->
    <div class="footer">⚡ Atendimento ao Cliente - Suporte 24h | 📧 suporte@empresa.com</div>

</body>
</html>

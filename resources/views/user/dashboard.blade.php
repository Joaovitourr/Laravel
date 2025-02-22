<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Chamados</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .status {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            color: white;
        }

        .status.aberto {
            background-color: #e74c3c;
        }

        .status.andamento {
            background-color: #f39c12;
        }

        .status.concluido {
            background-color: #2ecc71;
        }

        .form-container {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none
        }

        input[type="submit"], button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .status-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .status-container input[type="text"] {
            width: 70%;
            display: inline-block;
        }

        .status-container input[type="submit"] {
            display: inline-block;
            width: 25%;
            margin-left: 5%;
        } .error-message{
            color: #e74c3c;
            font-weight: bold;
        } .success{
            color: rgb(18, 146, 18);
            font-weight: bold;
            font-size: 1.3rem;

        } .ticket-status {
    max-width: 100%;
    margin: 20px auto;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fafafa;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.ticket-status h2 {
    text-align: center;
    font-size: 1.8em;
    color: #333;
    margin-bottom: 20px;
}

.ticket-info div {
    margin-bottom: 12px;
}

.ticket-info strong {
    font-weight: bold;
    color: #333;
}

.ticket-info span {
    color: #555;
}

.ticket-info p {
    font-size: 1.1em;
    color: #555;
}

.urgency-level {
    font-weight: bold;
    color: #f44336;
}

.status {
    font-weight: bold;
}

.status.open {
    color: #4CAF50;
}

.status.closed {
    color: #f44336;
}

    </style> 
</head>
<body>

    <header>
        <h1>Página de Chamados - Suporte Técnico</h1>
    </header>

    <div class="container">
        <div class="card">
            <h2>Bem-vindo, <span id="nome-usuario">{{ session('name') }}</span></h2>


         
           
            @foreach($tickets as $ind=> $ticket)
                         
        



            <div class="ticket-status">
                <h2>📋 Chamado Atual</h2>
            
                <div class="ticket-info">
                    <div>
                        <strong>📝 Título:  {{ $ticket->title  }} </strong> <span></span>
                    </div>
            
                    <div>
                        <strong>📜 Descrição:</strong> {{  $ticket->description }} <p></p>
                    </div>
            
                    
                    <div>
                        <strong>⚠️ Urgência:</strong> <span class="urgency-level"> 

                            {{ $ticket->priority }}
                        </span>
                    </div>
            
                    <div>
                        <strong>📢 Status:</strong> <span class="status"> </span>
                    </div>
                </div>
            </div>
    
            <p><strong>
                Abrir chamado </strong>  <span id="chamados-abertos">
                     
       </span></p>

       
       @endforeach
 
           <div> 
            <Button class=""> Abrir chamado   </Button>
           </div>



    
        
            @if(session('success')) 

              <p class="success"> O seu chamado foi aberto com sucesso </p>

            @endif
        
        </div>

        <div class="card">
            <h2>Criar Novo Chamado </h2>
            <div class="form-container">
                <form action=" {{ route('openTicket')}} " method="POST">

                    @csrf 


                    <label for="title_Ticket">Título do  Chamado</label>
                    <input type="text" id="title_Ticket" name="title_Ticket" required value="{{ old('title_Ticket') }}">

                    
                


                    <label for="description_Ticket">Descrição</label>
                    <textarea id="description_Ticket" are name="description_Ticket" rows="4" required ></textarea>

                    <label for="urgency_Ticket">Urgência</label>
               


                    <input type="number" id="urgency_Ticket" name="urgency_Ticket" min="1" max="5" value=" {{ old('urgency_Ticket') }}">

                    <input type="submit" value="Enviar Chamado">

                    @if($errors->any())

                     @foreach($errors->all() as $erro)

                      <p class="error-message"> {{ $erro }} </p>

                     @endforeach


                    @endif

                </form>
            </div>
        </div>

       
        <div class="card">
            <h2>Verificar Status do Chamado</h2>
            <div class="status-container">

                @csrf 

                <form action=" {{ route('called')}} " method="GET">

                    @csrf

                    <input type="hidden" value="{{ session('id') }}">

                    <label for="protocolo">Protocolo</label>
                    <input type="text" id="protocolo" name="protocolo" required>

                    <input type="submit" value="Verificar Status">
                </form>
            </div>

            <div id="status-chamado" class="status aberto">
                <h3>Status: Chamado em aberto</h3>
            </div>
        </div>
    </div>


    <script> 


    

    </script> 


</body>
</html>

<h3>Fornecedor</h3>


{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php 
    /*
    if (isset($variavel)){} //retornar true se a variavel estar definida
    - ""
    - 0
    - 0.0
    - '0'
    - null
    - false
    - array()
    - $var
    */
@endphp

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
            
            

            Iteração atual: {{$loop->iteration}}
            <br>
            Fornecedor: {{ $fornecedor['nome'] }} 
            <br>
            Status: {{ $fornecedor['status'] }}
            <br>
            CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
            <br>
            Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
            <br>
            @if($loop->first)
                Primeira iteração do loop
            @endif

            @if($loop->last)
                Última iteração do loop

                <br>
                Total de registros: {{$loop->count}}// Identifica e conta quantos loops
            @endif
            <hr>
            @empty
                Não existem fornecedores cadastrados!!
            @endforelse
@endisset


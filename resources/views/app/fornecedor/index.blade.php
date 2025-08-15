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

    @php $i = 0 @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores [$i] ['nome'] }} 
        <br>
        Status: {{ $fornecedores [$i] ['status'] }}
        <br>
        CNPJ: {{ $fornecedores [$i] ['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedores [$i] ['ddd'] ?? '' }}) {{ $fornecedores [$i] ['telefone'] ?? '' }}
        @php $i++ @endphp
    @endwhile

@endisset


@extends('site.layout.master')

@section('title', 'GLIC')

@section('content_header')

 <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><strong>KEY</strong></li>
        </ol>
      </div>
    </div>
<br>

@stop

@section('content')             
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
      	         <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Solicitante</th>
                                <th>Depertamento</th>
                                <th>Nº Ata</th>
                                <th>Nº Pregão</th>
                                <th>Nº Processo</th>
                                <th>Vigencia</th>
                                <th>Pdf</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($caronas as $carona)
                            
                            <tr>
                                <td>{{$carona->User->Solicitante->orgao}}</td>
                                <td>{{$carona->Atas->departamento}}</td>
                                <td>{{$carona->Atas->nata}}</td>
                                <td>{{$carona->Atas->npregao}}</td>
                                <td>{{$carona->Atas->nprocesso}}</td>
                                <td>{{ date( 'd/m/Y', strtotime($carona->Atas->data_vigencia)) }}</td>  
                                <td width="40"><a href="{{ route('download.pdf.hey', $carona->id) }}">EM DESENVOLVIMENTO</a></td>
                            </tr>
                        @empty
                            <div class="alert alert-warning">
                                <p><strong> <i class="fas fa-exclamation-circle"></i> Não existe registro </strong></p>
                            </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>         


@endsection

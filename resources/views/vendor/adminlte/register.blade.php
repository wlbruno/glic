@extends('adminlte::master')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', 'register-page')

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('body')
    
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('home.index') }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
            <p><span> {{ session('plan')->name }}</span></p>
            <form action="{{ route('register') }}" method="post">
                {{ csrf_field() }}

                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}"
                           placeholder="Nome Completo" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>

                 <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}"
                           placeholder="E-mail">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                 <div class="input-group mb-3">
                    <select class="form-control" name="estado"  autofocus>
                          <option value="" disabled="" selected="">Selecione o seu estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                 <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-map-marked-alt"></span>
                                        </div>
                                    </div>
                                </div>

     @if ($errors->has('ramal'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('ramal') }}</strong>
                        </div>
                    @endif

                <div class="input-group mb-3">
                    <input type="text" name="ramal" class="form-control fone {{ $errors->has('ramal') ? 'is-invalid' : '' }}" value="{{ old('ramal') }}"
                           placeholder="Telefone" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone-square-alt"></span>
                        </div>
                    </div>

                    @if ($errors->has('ramal'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('ramal') }}</strong>
                        </div>
                    @endif
                </div>

                 <div class="input-group mb-3">
                    <input type="text" name="orgao" class="form-control {{ $errors->has('orgao') ? 'is-invalid' : '' }}" value="{{ old('orgao') }}"
                           placeholder="Órgão" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>

                    @if ($errors->has('orgao'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('orgao') }}</strong>
                        </div>
                    @endif
                </div>

                   <div class="input-group mb-3">
                    <input type="text" name="cnpj" class="form-control cnpj {{ $errors->has('cnpj') ? 'is-invalid' : '' }}" value="{{ old('cnpj') }}"
                           placeholder="CNPJ" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-id-card"></span>
                        </div>
                    </div>

                    @if ($errors->has('cnpj'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('cnpj') }}</strong>
                        </div>
                    @endif
                </div>


                 <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="Senha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                 <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}"
                           placeholder="Confirma Senha ">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('confirm_password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Registrar
                </button>
            </form>
            <p class="mt-2 mb-1">
                <a href="{{ route('home.index') }}">
                    Já tenho Conta
                </a>
            </p>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
         <script src="{{asset('js/jquery.mask.js')}}"></script>
      <script src="{{asset('js/mask.js')}}"></script>
@stop

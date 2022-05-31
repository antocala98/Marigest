@section('title','Registrazione')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <?php
        if(!isset($standby)){ ?>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!-- Name -->
                <div>
                    <x-label for="nome" :value="__('Nome')" />

                    <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />

                </div>

                <div class="mt-4">
                    <x-label for="cognome" :value="__('Cognome')" />

                    <x-input id="cognome" class="block mt-1 w-full" type="text" name="cognome" :value="old('cognome')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!-- Grado sezione appartenenza e tipo corso -->
                <div>
                    <x-label for="grado" :value="__('Grado')" />

                    <select id="grado" name="grado" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="Com 2^">Com 2^</option>
                        <option value="Com 1^">Com 1^</option>
                        <option value="Sottocapo">Sottocapo</option>
                        <option value="SC 3^">SC 3^</option>
                        <option value="SC 2^">SC 2^</option>
                        <option value="SC 1^">SC 1^</option>
                        <option value="SC 1^ SC">SC 1^ SC</option>
                        <option value="SC 1^ SC QS">SC 1^ SC QS</option>
                        <option value="Sergente">Sergente</option>
                        <option value="2° C°">2° C°</option>
                        <option value="2° C° SC">2° C° SC</option>
                        <option value="2° C° SC QS">2° C° SC QS</option>
                        <option value="C° 3^">C° 3^</option>
                        <option value="C° 2^">C° 2^</option>
                        <option value="C° 1^">C° 1^</option>
                        <option value="1° MRS">1° MRS</option>
                        <option value="LGT">LGT</option>
                        <option value="1° LGT">1° LGT</option>
                        <option value="A.G.M.">A.G.M.</option>
                        <option value="G.M.">G.M.</option>
                        <option value="S.T.V.">S.T.V.</option>
                        <option value="TV">T.V.</option>
                        <option value="C.C.">C.C.</option>
                        <option value="C.F.">C.F.</option>
                        <option value="C.V.">C.V.</option>
                        <option value="C.A.">C.A.</option>
                        <option value="A.D.">A.D.</option>
                        <option value="A.S.">A.S.</option>
                    </select>

                </div>

                <div>
                    <x-label for="sezione_appartenenza" :value="__('Sezione appartenenza')" />

                    <select id="sezione_appartenenza" name="sezione_appartenenza" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="corsi">Corsi</option>
                        <option value="incorporamento">Incorporamento</option>
                        <option value="sanitaria">Sanitaria</option>
                        <option value="vestiario">Vestiario</option>
                    </select>

                </div>


                <div>
                    <x-label for="comando_appartenenza" :value="__('Comando')" />

                    <select id="comando_appartenenza" name="comando_appartenenza" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <?php 
                        if(isset($corsi)){
                            foreach($corsi as $corso){ 
                                if($corso->tipo_corso == "NMRS" || $corso->tipo_corso == "Vfp4") { ?>
                                    <option value="{{$corso->numero_corso}}_{{$corso->tipo_corso}}">{{$corso->numero_corso}} {{$corso->tipo_corso}}</option> <?php
                                } else { ?>
                                    <option value="{{$corso->tipo_corso}}">{{$corso->tipo_corso}}</option> <?php
                                }
                            }
                        }
                        ?>
                    </select>

                </div>

            </div>


            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            </div>

            
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button element="button" class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <?php } else { 
            echo $standby;
        ?>
        <br><br><br>
        <x-button element="a" href="{{url('/')}}" class="ml-4 justify-center">
            {{ __('Continua...') }}
        </x-button> <?php 
        } ?>
    </x-auth-card>
</x-guest-layout>
<script>
    document.getElementById("sezione_appartenenza").onchange = function () {
        document.getElementById("comando_appartenenza").setAttribute("disabled", "disabled");
        if (this.value == 'corsi')
            document.getElementById("comando_appartenenza").removeAttribute("disabled");
    };
</script>    

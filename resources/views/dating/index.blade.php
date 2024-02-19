@extends('layouts.layout')
@section('title', 'Agenda de citas')

@section('content')

    <div class="card">
        <div class="card-body row">
            <div class="row">
                <form action="{{ route('dating.store') }}" method="POST" id="create-date-form">
                    @csrf
                    <input type="hidden" name="formulario_enviado" value="1">
                    <label for="input_title">Titulo</label>
                    <input id="input_title" class="form-control" type="text" name="title" value="{{ old('title') }}">
                    <label for="input_date">Fecha</label>
                    <input id="input_date" class="form-control" type="date" name="date" value="{{ old('date') }}">
                    <label for="input_time">Hora</label>
                    <input id="input_time" class="form-control" type="time" name="time" value="{{ old('time') }}">
                    <label for="floatingTextarea2">Descripción</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="" name="description" id="floatingTextarea2" style="height: 100px"
                            cols="30" rows="10">{{ old('description') }}</textarea>
                        <label for="floatingTextarea">Datos de la cita</label>
                    </div>
                    <div class="mt-4">
                        <label for="userId">Cliente</label>
                        <span class="text-l text-danger"> @error('user_id')
                                {{ '*El cliente seleccionado ya tiene una cita agendada a esa misma hora y fecha' }}
                            @enderror
                        </span>
                        <br>
                        <select class="js-example-basic-single js-example-responsive" style="width:100%" name="user_id">
                            <option>-- Seleccione un cliente --</option>
                            @foreach ($users as $user)
                                @if ($user->type_user == '2')
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name . ' - ' . $user->identification }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <label class="mt-3" for="adviserId">Asesor</label>
                        <span class="text-l text-danger">
                            @error('adviser_id')
                                {{ '*El asesor seleccionado ya tiene una cita agendada a esa misma hora y fecha' }}
                            @enderror
                        </span>
                        <br>
                        <select class="js-example-basic-single js-example-responsive" style="width:100%"
                            name="adviser_id"id="adviserId">
                            <option>-- Seleccione un asesor --</option>
                            @foreach ($users as $user)
                                @if ($user->type_user == '3')
                                    <option
                                        value="{{ $user->id }}"{{ old('adviser_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name . ' - ' . $user->identification }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <label class="mt-3" for="propertyId">Inmueble</label>
                        <span class="text-l text-danger">
                            @error('property_id')
                                {{ '*El inmueble seleccionado ya está agendado a esa misma hora y fecha' }}
                            @enderror
                        </span>
                        <br>
                        <select class="js-example-basic-single js-example-responsive" style="width:100%" name="property_id"
                            id="userId">
                            <option>-- Seleccione un inmueble --</option>
                            @foreach ($properties as $property)
                                <option
                                    value="{{ $property->id }}"{{ old('property_id') == $property->id ? 'selected' : '' }}>
                                    {{ $property->propertiesType . ' - ' . $property->description . ' - ' . $property->address }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <input name="availability" type="hidden" value="1">
                    <button class="mt-3 btn btn-primary">Agendar cita</a>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            let today = new Date().toISOString().split('T')[0];

            document.getElementById("input_date").setAttribute('min', today);

            document.getElementById("create-date-form").addEventListener("submit", function(event) {
                let select_id = document.querySelector('select[name="user_id"]').value;
                let input_title = document.querySelector("#input_title").value;
                let input_date = document.querySelector("#input_date").value;
                let input_time = document.querySelector("#input_time").value;
                let description = document.querySelector('textarea[name="description"]').value;
                //let inputHide = document.querySelector('input[name="availability"]').value;
                let currentDate = new Date();
                let coerCurrentDate = Date.parse(currentDate)
                let coerInputDate = Date.parse(input_date)

                if (document.querySelector('input[name="formulario_enviado"]').value === "1") {
                    if (input_title === "" || input_date === "" || input_time === "") {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Todos los campos deben estar llenos",
                            //footer: '<a href="#">Why do I have this issue?</a>'
                        })
                        event.preventDefault();
                    } else if (select_id === "-- Seleccione un cliente --") {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Debes seleccionar un cliente",
                        });
                        event.preventDefault();
                    } // else if (coerInputDate < coerCurrentDate) {
                    //     Swal.fire({
                    //         icon: "error",
                    //         title: "Error",
                    //         text: "error no puedes agendar para días pasados",
                    //     });
                    //     event.preventDefault();
                    // }

                }

                // let data = {
                //     user_id: select_id,
                //     title: input_title,
                //     date: input_date,
                //     time: input_time,
                //     description: description,
                //     availability: "1"
                // }

                // axios.post("http://127.0.0.1:8000/api/agenda", data, {
                //         "content-type": "application/json"
                //     })
                //     .then(response => {
                //         console.log(response);
                //     })
                //     .catch(error => {
                //         if (error.response) {
                //             Swal.fire({
                //                 icon: "error",
                //                 title: "Error",
                //                 text: "Este cliente ya fue agendado para una cita a esa fecha y hora",
                //             });
                //             event.preventDefault();
                //         }
                //     });
            })
        })
    </script>
@endsection

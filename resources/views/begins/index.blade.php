<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body style="background-color: #F8F9FC">
    <div class="container row" style="padding-left: 15%;">
        <div class="container col-5 d-flex justify-content-center mb-3">
            <img class="img-fluid" src="{{ asset('storage/logo-montana.png') }}" alt="logo inmobiliaria"
                style="width: 80%;">
        </div>
        <form method="POST" id="formId">
            @csrf
            <div class="container col-8 d-flex justify-content-center mb-3 fs-4">
                <label for="identificationInput" class="fw-bold">Número de identificación</label>
            </div>
            <div class="container col-7">
                <input class="form-control fs-5 d-flex justify-content-center" type="number" name="code"
                    id="identificationInput" style="text-align: center;" min="0">
            </div>
            <div class="container col-8 d-flex justify-content-center mt-3">
                <button id="buttonId" type="button" onclick="sendId()" class="fs-5 btn btn-primary">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function formCode() {
        let body = document.querySelector("body");
        body.insertAdjacentHTML("beforeend",
            `
                <div class="container row" style="padding-left: 15%;">
                    <form method="POST" id="formCode">
                        @csrf
                        <div class="container col-8 d-flex justify-content-center fs-4">
                            <label class="fw-bold">Código</label>
                        </div>
                        <div class="container col-7 d-flex justify-content-center fs-3">
                            <span class="fs-5 text-primary">Ingresa el código enviado al correo</span>
                        </div>
                        <div class="container col-8">
                            <input class="form-control fs-5 d-flex justify-content-center" type="number" name="code" id="inputCode" style="text-align: center; min="0">
                        </div>
                        <div class="container col-8 d-flex justify-content-center mt-3">
                            <button id="buttonCode" type="button" onclick="sendCode()" class="fs-5 btn-code btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            `)
    }

    function buttonOff() {
        let fun = {
            butt: button = document.querySelector("#buttonId"),
            func: function() {
                setTimeout(() => {
                    if (!this.butt.hasAttribute("disabled")) {
                        this.butt.setAttribute("disabled", "disabled");
                    } else {
                        this.butt.removeAttribute("disabled");
                    }
                });
            }
        }
        fun.func();
    }

    document.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });

    function sendId() {
        let identificationInput = document.querySelector("#identificationInput");
        let identificationValue = identificationInput.value;
        let formId = document.querySelector("#formId");
        buttonOff();
        axios.post("{{ route('api.sendIdentification') }}", {
                identification: identificationValue
            })
            .then((res) => {
                button.removeAttribute("onclick");
                formId.setAttribute("hidden", "");
                formCode();
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: res.data,
                    showConfirmButton: true,
                });
            })
            .catch((err) => {
                console.log("🚀 ~ sendId ~ err:", err)
                buttonOff();
                Swal.fire({
                    position: "top",
                    icon: "error",
                    title: err.response.data,
                    showConfirmButton: false,
                    timer: 2000
                });
            })
    }

    function sendCode() {
        let identificationInput = document.querySelector("#identificationInput");
        let identificationValue = identificationInput.value;
        let inputCode = document.querySelector("#inputCode");
        axios.post("{{ route('api.sendCode') }}", {
                code: inputCode.value,
                identification: identificationValue
            })
            .then((response) => {
                window.location.href = 'http://127.0.0.1:8000/';
            })
            .catch((err) => {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: err.response.data[0],
                    timer: 2000
                });
            })

    }
</script>

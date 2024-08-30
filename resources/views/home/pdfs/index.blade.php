<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }


        table {
            width: 100%;
        }

        tr {
            height: 40px;
        }

        td {
            border: 1px solid black;
        }

        .colOne {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 15%;
            position: relative;
            padding: auto;
        }

        .colOne img {
            height: 40px;
            width: 35px;
        }

        .colTwo {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 60%;
            font-size: 10px;
            padding: auto;
        }


        .colThree {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 25%;
            font-size: 10px;
            padding: auto;
        }

        .colThree > div {
            width: 100%;
        }

        .container-user-info{
            display: flex;
            align-items: center;
        }

        .user-info{
            border-bottom: 1px solid black;
            margin-left:5px;
        }

        .fila1{
            background-color: #D1D5D8;
        }


        .firmas {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .observation{

        }

        .signature-image {
            width: auto; /* El ancho se ajusta automáticamente */
            height: 40px; /* Altura fija para mantener consistencia */
            max-width: 200px; /* Máximo ancho permitido */
            min-width: 150px; /* Mínimo ancho permitido */
            object-fit: contain; /* Contiene la imagen dentro del espacio disponible sin distorsionarla */
        }


    </style>
</head>

@php
    use Carbon\Carbon;
    $birthdate = new Carbon($user->birthdate);
    $age = $birthdate->age;
@endphp

<body>
    <table>
        <tr>
            <td class="colOne"><img src="{{ public_path('img/logo-pdf.png') }}" alt="Logo-Colegio"></td>
            <td class="colTwo">
                <br><br><br>
                PROMOCIÓN DEL SERVICIO, ADMISIONES Y MATRÍCULAS <br><br>
                INFORME DE RESULTADOS DE ADMISIÓN
            </td>
            <td class="colThree">
                <br><br><br>
                <span>Código: M1-FOR03</span> <br>
                <span>Versión: 02</span> <br>
                <span>Fecha: 01/01/2022</span> <br>
                <span>Página 1 de 2</span>
            </td>
        </tr>
    </table>

    <div class="container-user-info">
        <p><strong>Nombre del Aspirante:</strong><span class="user-info" > {{ $user->name }} {{ $user->last_name }}</span></p>
        <p><strong>Grado al que aspira:</strong><span class="user-info" > {{ $user->degree }} </span></p>
        <span>Fecha de nacimiento: {{ $user->birthdate }} </span> <span> Edad: {{ $age }}</span>
    </div>

    @if ($observation)
    <div class="observation">
        <table>
            <tr class="fila1">
                <td><h2>Concepto - Psicoorientador(a):</h2></td>
            </tr>
            <tr>
                <td><p style="white-space: pre-line; ">{!! nl2br(implode("\n", $observation)) !!}</p></td>
            </tr>
            <tr class="fila2">
                <td><br><br>Firma: 
                    @if($signaturePsicoorientador)
                        <img src="{{ public_path('img/digital/' . $signaturePsicoorientador) }}" class="signature-image" alt="Firma del Psicoorientador">
                    @else
                        Sin firma
                    @endif
                </td>
            </tr>
        </table>

    </div>
    @endif

    @if ($observation2)
    <div class="observation">
        <table>
            <tr class="fila1">
                <td><h2>Concepto - Coordinador(a) Académico:</h2></td>
            </tr>
            <tr>
                <td><p style="white-space: pre-line; ">{!! nl2br(implode("\n", $observation2)) !!}</p></td>
            </tr>
            <tr class="fila2">
                <td><br><br>Firma: 
                    @if($signatureAcademico)
                        <img src="{{ public_path('img/digital/' . $signatureAcademico) }}" class="signature-image" alt="Firma del Coordinador Academico">
                    @else
                        Sin firma
                    @endif
                </td>
            </tr>
        </table>

    </div>
    @endif

    @if ($observation3)
    <div class="observation">
        <table>
            <tr class="fila1">
                <td><h2>Concepto - Coordinador(a) Convivencia:</h2></td>
            </tr>
            <tr>
                <td><p style="white-space: pre-line; ">{!! nl2br(implode("\n", $observation3)) !!}</p></td>
            </tr>
            <tr class="fila2">
                <td><br><br>Firma: 
                    @if($signatureConvivencia)
                        <img src="{{ public_path('img/digital/' . $signatureConvivencia) }}" class="signature-image" alt="Firma del Coordinador Convivencia">
                    @else
                        Sin firma
                    @endif
                </td>
            </tr>
        </table>

    </div>
    @endif

    @if ($observation4)
    <div class="observation">
        <table>
            <tr class="fila1">
                <td><h2>Concepto - Rector(a):</h2></td>
            </tr>
            <tr>
                <td><p style="white-space: pre-line; ">{!! nl2br(implode("\n", $observation4)) !!}</p></td>
            </tr>
            <tr class="fila2">
                <td><br><br>Firma: 
                    @if($signatureRector)
                        <img src="{{ public_path('img/digital/' . $signatureRector) }}" class="signature-image" alt="Firma del Rector">
                    @else
                        Sin firma
                    @endif
                </td>
            </tr>
        </table>

    </div>
    @endif

    <div>
        <span>Admitido(a)  SI ______ NO ______</span> <br>
        <span>Compromiso de Nivelación Académica SI ______ NO ______</span>
    </div>

    <div class="firmas">
    <span>Firma del Padre: _____________________</span> <span>   </span><span>Firma de la Madre: _________________</span>
    </div>

</body>
</html>

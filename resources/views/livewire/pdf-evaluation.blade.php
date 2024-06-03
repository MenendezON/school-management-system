<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        @page { margin: 50px 70px; }
        .header{
            text-align: center;
            border-bottom:2px solid black;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        h2{
            margin:0px;
        }
        .card{
            margin-bottom: 7px;
        }
        .card>.categ-title{
            font-weight: bold;
            font-size: large;
        }

        .card>.categ-content{
            text-align: justify;
        }

        .footer table{
            margin-top: 75px;
            width: 100%;
        }
        .footer>table td{
            width: 33%;
        }
    </style>
</head>

<body>
    <div class="print-page">
        <div class="header">
            @foreach($options as $option)
                <h2>{{ucwords($option->first_name)}} {{strtoupper($option->last_name)}}</h2>
                <p>{{ \Carbon\Carbon::parse($option->date_of_birth)->format('d M Y') }}, {{$option->place_of_birth}}</p>
                @break
            @endforeach
        </div>
        @foreach($reports as $key => $rslt)
        <div class="card">
            <div class="categ-title">
                {{ $key }}
            </div>
            <div class="categ-content">
                @foreach($rslt as $val)
                    {{ $val }}
                @endforeach
            </div>
        </div>
        @endforeach
        <div class="footer">
            <table>
                <tr>
                    <td>
                        <p>Fait à Dakar, le {{Date('d/m/Y')}}</p>
                    </td>
                    <td>&nbsp;</td>
                    <td class="signature">
                        <hr>
                        <p>La Direction</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
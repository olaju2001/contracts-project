<!DOCTYPE html>
<html dir="rtl" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      @if(app()->getLocale() == 'ar')
        *{ font-family: DejaVu Sans, sans-serif;direction: rtl; text-align: right; }
      @endif
        .table{
            width: 100%;
        }

        /* table tr td:nth-of-type(2), table tr th:nth-of-type(2){
            text-align: right;
        } */

        thead th{
            max-width: 300px;
            border-bottom: 1px solid black
        }

        tbody td{
            max-width: 300px;
            word-break: break-all;
            word-break: break-word;
        }
    </style>
</head>
<body>
    <h5>husband Information</h5>
    <p> First Name : {{$array[0]['client_information']['first_name']}}</p>
    <p> Email : {{$array[0]['client_information']['email']}}</p>
    <p> Birth date : {{$array[0]['client_information']['birth_date']}}</p>
    <p> Birth Place : {{$array[0]['client_information']['birth_place']}}</p>
    <p> nationality : {{$array[0]['client_information']['nationality']}}</p>
    <p> Marital Status : {{$array[0]['client_information']['marital_status']}}</p>
    <p> Profession : {{$array[0]['client_information']['profession']}}</p>
    <p> address : {{$array[0]['client_information']['address']}} </p>
    <p> Phone Number : {{$array[0]['client_information']['phone_number']}}</p>



    <hr>
    <h5>Wife Information</h5>
    <p> First Name : {{$array[1]['client_information']['first_name']}}</p>
    <p> Email : {{$array[1]['client_information']['email']}}</p>
    <p> Birth date : {{$array[1]['client_information']['birth_date']}}</p>
    <p> Birth Place : {{$array[1]['client_information']['birth_place']}}</p>
    <p> nationality : {{$array[1]['client_information']['nationality']}}</p>
    <p> Marital Status : {{$array[1]['client_information']['marital_status']}}</p>
    <p> Profession : {{$array[1]['client_information']['profession']}}</p>
    <p> address : {{$array[1]['client_information']['address']}} </p>
    <p> Phone Number : {{$array[1]['client_information']['phone_number']}}</p>

    <hr>
    <h5>First Witness Information</h5>
    <p> First Name : {{$array[2]['client_information']['first_name']}}</p>
    <p> Email : {{$array[2]['client_information']['email']}}</p>
    <p> Birth date : {{$array[2]['client_information']['birth_date']}}</p>
    <p> Birth Place : {{$array[2]['client_information']['birth_place']}}</p>
    <p> nationality : {{$array[2]['client_information']['nationality']}}</p>
    <p> Marital Status : {{$array[2]['client_information']['marital_status']}}</p>
    <p> Profession : {{$array[2]['client_information']['profession']}}</p>
    <p> address : {{$array[2]['client_information']['address']}} </p>
    <p> Phone Number : {{$array[2]['client_information']['phone_number']}}</p>

    <hr>
    <h5>Second Witness Information</h5>
    <p> First Name : {{$array[3]['client_information']['first_name']}}</p>
    <p> Email : {{$array[3]['client_information']['email']}}</p>
    <p> Birth date : {{$array[3]['client_information']['birth_date']}}</p>
    <p> Birth Place : {{$array[3]['client_information']['birth_place']}}</p>
    <p> nationality : {{$array[3]['client_information']['nationality']}}</p>
    <p> Marital Status : {{$array[3]['client_information']['marital_status']}}</p>
    <p> Profession : {{$array[3]['client_information']['profession']}}</p>
    <p> address : {{$array[3]['client_information']['address']}} </p>
    <p> Phone Number : {{$array[3]['client_information']['phone_number']}}</p>

    <hr>
    <h5>Agent Information</h5>
    <p> First Name : {{$array[4]['client_information']['first_name']}}</p>
    <p> Email : {{$array[4]['client_information']['email']}}</p>
    <p> Birth date : {{$array[4]['client_information']['birth_date']}}</p>
    <p> Birth Place : {{$array[4]['client_information']['birth_place']}}</p>
    <p> nationality : {{$array[4]['client_information']['nationality']}}</p>
    <p> Marital Status : {{$array[4]['client_information']['marital_status']}}</p>
    <p> Profession : {{$array[4]['client_information']['profession']}}</p>
    <p> address : {{$array[4]['client_information']['address']}} </p>
    <p> Phone Number : {{$array[4]['client_information']['phone_number']}}</p>
    
    <hr>
    <h5>Quran Date</h5>
    {{$data['quran_date']}}

    <h5>Quran place</h5>
    <p>{{$data['is_mosque']}}  </p>

    <h5>Quran Address</h5>
    <p>{{$data['quran_address']}}</p>

    <hr>



</body>
</html>

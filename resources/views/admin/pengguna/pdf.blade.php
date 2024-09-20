<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - Data Pengguna</title>
    <style>
        table, tr, th,td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            font-weight: 600;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="text-center">
                <h1>{{$title}} </h5>
            </div>
        </div>

        <div class="row">
            <div class="">
                <div class="">
                    <table class="" style="width: 100%">
                        <tr>
                            <th width="1%">No</th>
                            <th>Email</th>
                            <th>Wilayah</th>
                            <th>Gereja</th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @forelse ($datas as $data)
                            <tr class="text-center">
                                <td>{{ ++$i }}</td>

                                <td>
                                    {{
                                        $data->email ?? ''
                                    }}
                                </td>

                                <td>
                                    {{
                                        $data->wilayah->nama_wilayah ?? ''
                                    }}
                                </td>


                                <td>
                                    {{
                                       $data->gereja->nama_gereja ?? ''

                                    }}
                                </td>




                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    No data . . .
                                </td>
                            </tr>
                        @endforelse


                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

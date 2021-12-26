<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        @font-face {
            font-family: ipag;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/hkkaiiw.ttf') }}') format('truetype');
        }
        @font-face {
            font-family: ipag;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/hkkaiiw.ttf') }}') format('truetype');
        }
        body {
            font-family: ipag !important;
        }
    </style>
</head>
<body>
 <div class="container">
        <div class="row">
            <h2>奉納金一覧</h2>
        </div>
        
        <div class="row">
            <div class="list-dedication-moneys col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">日付</th>
                                <th width="20%">名前</th>
                                <th width="10%">金額</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $dedication_money)
                                <tr>
                                    <td>{{ \Str::limit($dedication_money->date, 100) }}</td>
                                    <td>{{ \Str::limit($dedication_money->dedicater->name, 250) }}</td>
                                    <td>{{ \Str::limit($dedication_money->money, 250) }}</td>
                                    
                                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
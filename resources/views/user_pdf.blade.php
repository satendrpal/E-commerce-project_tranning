<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
</head>
<body>

<h2>User Data</h2>


<table class="table table-bordered" id="table" border="2" cellspacing="0">
                <thead>
                    <tr class="thead-dark">
                        <th >S.no</th>
                        <th>Deposite</th>
                        <th>Withdrawal</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    ?>
                    @foreach ($data as $value)
                        <tr>
                            <td><?php echo $i ?></td>
                            <td>{{$value->deposit}}</td>
                            <td>{{$value->withdrawal}}</td>
                            <td>{{$value->date}}</td>
                        </tr>
                        <?php
                        $i++;
                        ?>
                        @php $total_deposit += $val->deposit + $val->deposit; @endphp
                        @php $total_withdrawal += $val->withdrawal + $val->withdrawal; @endphp
                    @endforeach

                </tbody>
                <thead>
      <tr>
       
        <th></th>
        <th>Grand Total</th>
        <th id="totalprice">₹{{ $total_deposit }}</th>
        <th id="totalprice">₹{{ $total_withdrawal }}</th>
      </tr>
    </thead>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($pages as $page)
    @if($page->page_url=='#')
    <table class="table table-bordered" style="margin-left: 124px; max-width:1100px">
    <thead>
        <tr>
            <td style="color:red">{{$page->page_name}}<td>
            @foreach($pages2 as $page2)
            @if($page->id==$page2->page_id)
            <tr>
            <td>{{$page2->page_name}}<td>
           </tr>
            @endif
            @endforeach
        </tr>
        @endif
    @endforeach
</thead>
</table>
</body>
</html>
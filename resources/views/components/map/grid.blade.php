<h2 class="text-xl">Grid {{$columns}} x {{$rows}}</h2>
<br>
<table class="table">
    @for($i=0;$i<$rows;$i++)
        <x-map.row row="{{$i}}" columns="{{$columns}}" tiles="{{$tiles?$tiles[$i]:null}}"></x-map.row>
    @endfor
</table>

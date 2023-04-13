<tr>
@for($i=0;$i<$columns;$i++)
    <x-map.cell row="{{$row}}" column="{{$i}}" tile="{{$tiles?$tiles[$i]:null}}"></x-map.cell>
@endfor
</tr>

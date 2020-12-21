<div>KURWA</div>
<div>Текущий язык {{$currentLanguages}}</div>
@if (count($languages) > 0)
    <form action="{{route('tasks.choiseLanguage', 'lang')}}" method="POST">
        {{csrf_field()}}
        {{method_field("GET")}}
        <select name="" id="">
            @foreach($languages as $lang)
                <option value="{{$lang}}">{{$lang}}</option>
            @endforeach
        </select>
        <input type="submit" value="Complete">
    </form>
@endif

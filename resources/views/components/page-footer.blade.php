<hr style="margin-top:50px;" />
{{ $slot }}<br />
University of Latvia, {{ $year ?? "2024"}}

@isset($author)
    <br />{{ $author }}
@endisset

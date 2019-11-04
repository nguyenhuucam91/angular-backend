<form action="{{ action('ConverterController@store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file"/>
    <input type="submit" />
</form>
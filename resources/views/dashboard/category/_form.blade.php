@csrf
<label for="">Titulo</label>
<input type="text" name="title" value="{{old("title",$category)}}">

<label for="">Slug</label>
<input type="text" name="slug" value="{{old("slug",$category)}}">

<button type="submit">Enviar</button>
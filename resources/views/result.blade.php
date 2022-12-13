<table class="table table-striped table-bordered" id="dt">

    <thead class="text-primary">
        <tr>
            <th>N</th>

            <th>{{__('books.bookName')}}</th>
            <th>{{__('books.publication')}}</th>
            <th>{{__('books.authors')}}</th>

        </tr>
    </thead>
    <tbody>
        @if(!empty($books))
            @foreach($books as $key=>$book)
                <tr>
                    <td>{{$key+1}}</td>
                    <td >{{$book->book_name}}</td>
                    <td>
                        {{$book->publication}}
                    </td>
                    <td>
                        @foreach(($book->author) as $key=>$val)

                            {{$val}}

                        @endforeach
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>


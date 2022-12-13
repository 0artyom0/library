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
                    <td>{{++$start}}</td>
                    <td >{{$book->book_name}}</td>
                    <td>
                        @php
                            $publication = App\Models\User::where('id', $book->publicator_id)->first();
                        @endphp
                        {{$publication->name}}
                    </td>
                    <td>
                        @php
                            $cont = '';
                            foreach(($book->author) as $key=>$val)  
                            {                          
                                $cont .= $val.', ';
                            }
                        @endphp
                        
                        {{trim($cont, ', ')}}
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Books</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        
    </head>
    <body>
        <div class="container my-4 mx-auto">
            <h1>{{__('books.books')}}</h1>
            <br>

            <div id="tag_container">
                @include('result')

            </div>
            <div style="display: flex;justify-content: end">
                @php
                    $booksCount = \App\Models\Books::count();
                    $count = count($books);

                    $countValue = $booksCount /$count;
                    $number=number_format(ceil($countValue));
                    $val=(int)$number;

                @endphp
                <ul class="pagination">
                    <a href="">&laquo;</a>
                    @for($i=0;$i<$val;$i++)
                        @php
                            $j=$i+1;
                        @endphp
                        <a href="{{url('/?page='.$j)}}">{{$i+1}}</a>
                        
                    @endfor
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(window).on('hashchange', function() {
                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    }else{
                        getData(page);
                    }
                }
            });

            $(document).ready(function()
            {
                $(document).on('click', '.pagination a',function(event)
                {
                // alert(event)
                    event.preventDefault();

                    $('li').removeClass('active');
                    $(this).parent('li').addClass('active');

                    var myurl = $(this).attr('href');
                    var page=$(this).attr('href').split('page=')[1];

                    getData(page);
                });

            });

            function getData(page){
                $.ajax(
                    {
                        url: '?page=' + page,
                        type: "GET",
                        datatype: "html"
                    }).done(function(data){
                        console.log(data)
                    $("#tag_container").empty().html(data);
                    location.hash = page;
                }).fail(function(data){
                    console.log('No response >>', data);
                });
            }
        </script>
    </body>
</html>



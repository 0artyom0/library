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

            <div class="row" id="tag_container">
                @include('result')

            </div>
            @if($pageCount>1)
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item prev disabled">
                            <a class="page-link prevPage" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @for($i=0;$i<$pageCount;$i++)
                            @php
                                $j=$i+1;
                            @endphp
                            <li class="page-item @if($j==1) active @endif" page="{{$j}}"><a class="page-link" href="{{url('/?page='.$j)}}">{{$j}}</a></li>
                        @endfor
                        <li class="page-item next">
                            <a class="page-link nextPage" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function()
            {
                $(document).on('click', '.pagination a',function(event)
                {
                    event.preventDefault();

                    if(!$(this).parent('li').prev('li').hasClass('prev'))
                    {
                        $('.prev').removeClass('disabled');
                    }
                    else
                    {
                        $('.prev').addClass('disabled');
                    }

                    if(!$(this).parent('li').next('li').hasClass('next'))
                    {
                        $('.next').removeClass('disabled');
                    }
                    else
                    {
                        $('.next').addClass('disabled');
                    }

                    
                    if($(this).hasClass('prevPage'))
                    {
                        var page = Number($('.active').attr('page'))-1;
                        $('li').removeClass('active');
                        $('.page-item[page='+page+']').addClass('active');

                        if(!$('.active').prev('li').hasClass('prev'))
                        {
                            $('.prev').removeClass('disabled');
                        }
                        else
                        {
                            $('.prev').addClass('disabled');
                        }
                    }
                    else if($(this).hasClass('nextPage'))
                    {
                        var page = Number($('.active').attr('page'))+1;
                        $('li').removeClass('active');
                        $('.page-item[page='+page+']').addClass('active');

                        if(!$('.active').next('li').hasClass('next'))
                        {
                            $('.next').removeClass('disabled');
                        }
                        else
                        {
                            $('.next').addClass('disabled');
                        }
                    }
                    else
                    {
                        $('li').removeClass('active');
                        $(this).parent('li').addClass('active');

                        var myurl = $(this).attr('href');
                        var page=$(this).attr('href').split('page=')[1];
                    }

                    getData(page);
                });

            });

            function getData(page){
                $.ajax({
                    url: '?page=' + page,
                    type: "GET",
                    datatype: "html"
                }).done(function(data){
                    //console.log(data)
                    $("#tag_container").empty().html(data);
                }).fail(function(data){
                    console.log('No response >>', data);
                });
            }
        </script>
    </body>
</html>



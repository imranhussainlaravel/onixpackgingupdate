@include('layout.header')



    <div class="blog-container">
        <div class="blog-content">
            <!-- Dynamic content from the database goes here -->
            {!! $blog->content !!}
        </div>
    </div>


    @include('layout.footer')

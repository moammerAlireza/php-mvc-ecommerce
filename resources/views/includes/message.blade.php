<div class="row expanded column">
    @if(isset($errors)&& count($errors))
        <div class="callout alert" data-closable style="background-color: #e27676">
            @foreach ($errors as $error_array)
                @foreach ($error_array as $error_item)
                    {{$error_item}} <br/>
                @endforeach
            @endforeach

            <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if(isset($success) || \App\classes\Session::has('success'))
    <div class="callout succes" data-closable>
        @if (isset($success))
            {{$success}}
        @elseif(\App\classes\Session::has('success'))  
            {{\App\classes\Session::flash('success')}}
        @endif

        <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
            <span arial-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
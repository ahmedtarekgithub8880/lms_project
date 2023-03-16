
@extends('layouts.app')


<style>

@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }
    .wrapper2 {
        max-width: 600px;
        margin: 20px auto
    }
    .content2 {
        padding: 20px;
        padding-bottom: 50px
    }
    a:hover {
        text-decoration: none
    }
    p.text-muted {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 5px
    }
    b {
        font-size: 15px;
        font-weight: bolder
    }
    .option {
        display: block;
        height: 50px;
        background-color: #f4f4f4;
        position: relative;
        width: 100%
    }
    .option:hover {
        background-color: #e8e8e8;
        cursor: pointer
    }
    .option input {
        position: absolute;
        opacity: 0;
        cursor: pointer
    }
    .checkmark,
    .crossmark {
        position: absolute;
        top: 10px;
        right: 10px;
        height: 22px;
        width: 22px;
        background-color: #f4f4f4;
        border-radius: 2px;
        padding: 0
    }
    .option:hover input~.checkmark,
    .option:hover input~.crossmark {
        background-color: #e8e8e8
    }
    .option input:checked~.checkmark {
        background-color: #79d70f
    }
    .option input:checked~.crossmark {
        background-color: #ec3838
    }
    .checkmark:after,
    .crossmark:after {
        content: "\2714";
        position: absolute;
        background-color: #79d70f;
        display: none;
        color: #fff;
        padding-left: 4px;
        width: 22px;
        font-size: 16px
    }
    .crossmark:after {
        content: "\2715";
        background-color: #ec3838
    }
    .option input:checked~.checkmark:after,
    .option input:checked~.crossmark:after {
        display: block;
        transition: 100ms ease-out 1s
    }
    p.mb-4 {
        border-left: 3px solid green
    }
    p.my-2 {
        border-left: 3px solid red
    }
    input[type="submit"] {
        width: 100%;
        height: 50px;
        background-color: #da0b4e;
        border: none;
        outline: none;
        color: #fff;
        font-weight: 600;
        cursor: pointer
    }
    input[type="submit"]:hover:focus {
        border: none;
        outline: none;
        background-color: black
    }
</style>

@section('page_title' , __('Have a Test'))
@section('page_info' , __('Answer the quiz questions'))
@section('content')


@if(Session::has('success'))
        <script type="text/javascript">
            swal({
                title: "{{ trans('site.success') }}",
                text: "{{Session::get('success')}}",
                timer: 10000,
                type: 'primary'
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);

        </script>
    @endif


    @include('includes.breadcrumb')
    <br>
    <div class="wrapper2 bg-white rounded">

        <form action="{{ route('storeAnswer') }}" method="post">
            @csrf
            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        <div class="content2">
            <h2 class="">{{ $quiz->title }}   </h2><br>
            <a ><span class="fa fa-angle-right pr-2"></span>Multiple Choice Question</a>
            @forelse($quiz->questions as $key => $data)

              <input type="hidden" name="question_id[{{ $key+1 }}]" value="{{ $data->id }}">

            <p class="text-justify h5 pb-2 font-weight-bold">Q{{ $key + 1 }} .  &nbsp {{ $data->question->question }} ?</p>

            <b>Instructions</b>
            <p class="mt-2 mb-4 pl-2 text-justify">Please read the question carefully and choose Only (One correct answer)  </p>
            <p class="my-2 pl-2"> You can not edit your answer after you submit  </p>
            <br>
            <div class="options py-3">

                @forelse ( $data->question->options as $key => $option )

                    <label class="rounded p-2 option"> {{ $option->option }} <input type="radio"  name="answer[{{ $option->question_id }}]" value="{{ $option->id }}"> <span class="checkmark"></span> </label>
                @empty
                @endforelse

            </div>

            @empty

                    <br>
                <button type="button" class="btn btn-primary mx-sm-0 mx-1" data-toggle="modal" data-target="#exampleModalScrollable">
                    Show Result
                </button>
            @endforelse

            <br>
            <input type="submit" value="Submit Answer" class="mx-sm-0 mx-1" >

        </div>

        </form>
    </div>


@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Final Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               You have achieved -  <h1>{{ $score->score ?? 0 }} </h1>- degrees.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
</div>
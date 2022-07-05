@extends('index')

@section('body')

<div id="game-div" class="flex h-screen items-center justify-center bg-indigo-50 px-4" style="width: 100%;display: flex;flex-wrap: wrap">
    
    @foreach ($companies as $company)
        
        <a href="{{ route('companyshow', $company) }}"><div class="max-w-sm overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
            <img id="comp-img" src='{{ $company->company_image }}' alt="company" />
            <p class="p-5 text-medium mb-5 text-gray-700">{{ $company->name }}</p>            
            <form method="POST" action="{{ route('companies.destroy' , $company) }}">
                @csrf
                @method("delete")
                <button type="submit" class="text-gray-700 md:ml-4">
                    <svg style="float: right;margin-right:50px" aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                </button>
            </form>
        </div></a>
    @endforeach




    <a href="{{ route('companies.create') }}"><div class="max-w-sm overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
    <img style="width: 100%;height: 100%;"  src="https://www.mcicon.com/wp-content/uploads/2020/12/Abstract_Add_1-copy.jpg"/>
    </div></a>
</div>

@endsection
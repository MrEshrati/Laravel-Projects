@extends('dashboard.base')

@section('body')

<!-- component -->
<form class="w-full mx-auto pt-10 max-w-lg" action="{{ route('digitalproducts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-password">
            Name
          </label>
          <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
          
          @if($errors -> has('name'))

            <p class="text-red-600 text-xs italic">{{ $errors -> first('name') }}</p>
 
          @endif

        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="price">
          Price
        </label>
        <input name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="price" type="text">
        @if($errors -> has('price'))

        <p class="text-red-600 text-xs italic">{{ $errors -> first('price') }}</p>

        @endif

      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="dis">
          Discount
        </label>
        <input name="discount" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="dis" type="text">
        @if($errors -> has('discount'))

        <p class="text-red-600 text-xs italic">{{ $errors -> first('discount') }}</p>

        @endif

      </div>
    </div>
    
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="type">
          Type
        </label>
        <div class="relative  self-center">
            <svg class="text-white bg-teal-700 absolute top-0 right-0 m-2 pointer-events-none p-2 rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 38 22" version="1.1">
                <title>F09B337F-81F6-41AC-8924-EC55BA135736</title>
                <g id="ZahnhelferDE—Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="ZahnhelferDE–Icon&amp;Asset-Download" transform="translate(-539.000000, -199.000000)" fill="#ffffff" fill-rule="nonzero">
                        <g id="Icon-/-ArrowRight-Copy-2" transform="translate(538.000000, 183.521208)">
                            <polygon id="Path-Copy" transform="translate(20.000000, 18.384776) rotate(135.000000) translate(-20.000000, -18.384776) " points="33 5.38477631 33 31.3847763 29 31.3847763 28.999 9.38379168 7 9.38477631 7 5.38477631"/>
                        </g>
                    </g>
                </g>
            </svg>
            <select name="type" class="rounded border-2 border-teal-700 text-gray-600 h-14 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                @foreach ($types as $type)
                
                    <option value="{{ $type -> id }}">{{ $type -> name }}</option>
    
                @endforeach
            </select>
        </div>
    </div>
</div>


    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="cat">
            Categories
        </label>
        <select x-cloak id="select" style="display: none" name="categories" >

            @foreach ($categories as $category)
                
                <option value="{{ $category -> id }}">{{ $category -> name }}</option>

            @endforeach

        </select>

        <div x-data="dropdown()" x-init="loadOptions()" class="flex-col items-center h-32">
          <input name="values" type="hidden" x-bind:value="selectedValues()">
          <div class="block w-full">
              <div class="flex flex-col items-center relative">
                  <div x-on:click="open" class="w-full  svelte-1l8159u">
                      <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                          <div class="flex flex-auto flex-wrap">
                              <template x-for="(option,index) in selected" :key="options[option].value">
                                  <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                      <div class="text-xs font-normal leading-none max-w-full flex-initial x-model=" options[option]" x-text="options[option].text"></div>
                                      <div class="flex flex-auto flex-row-reverse">
                                          <div x-on:click="remove(index,option)">
                                              <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                                                  <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0 c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183 l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15 C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                              </svg>
                                          </div>
                                      </div>
                                  </div>
                              </template>
                              <div x-show="selected.length    == 0" class="flex-1">
                                  <input name="category" placeholder="Select a option" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800" x-bind:value="selectedValues()">
                              </div>
                          </div>
                          <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                              <button type="button" x-show="isOpen() === true" x-on:click="open"
                                  class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                  <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                      <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z" />
                                  </svg>
                              </button>
                              <button type="button" x-show="isOpen() === false" @click="close"
                                  class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                  <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                      <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83 c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z" />
                                  </svg>    
                              </button>
                          </div>
                      </div>
                  </div>
                  <div class="w-full">
                      <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj" x-on:click.away="close">
                          <div class="flex flex-col w-full">
                              <template x-for="(option,index) in options" :key="option">
                                  <div>
                                      <div class="cursor-pointer w-full border-gray-100 rounded-t border-b text-black hover:bg-teal-100" @click="select(index,$event)">
                                          <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                              class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                              <div class="w-full items-center flex">
                                                  <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </template>
                          </div>
                      </div>
                  </div>
              </div>          
            </div>
        </div>

        
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="des">
          Description
        </label>
        <textarea name="description" class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="des"></textarea>
      </div>
    </div>


    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="image">
        File Upload
    </label>
    <div class="bg-white p7 rounded w-full mx-auto mb-6">

    <div x-data="dataFileDnD()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
        <div x-ref="dnd"
            class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
            <input accept="image/*" type="file" name="image" multiple
                class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                @change="addFiles($event)"
                @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                title="" />
    
            <div class="flex flex-col items-center justify-center py-10 text-center">
                <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="m-0">Drag your files here or click in this area.</p>
            </div>
        </div>
    
        <template x-if="files.length > 0">
            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
                @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                <template x-for="(_, index) in Array.from({ length: files.length })">
                    <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                        style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null"
                        :class="{'border-blue-600': fileDragging == index}" draggable="true" :data-index="index">
                        <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="remove(index)">
                            <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                        <template x-if="files[index].type.includes('audio/')">
                            <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                        </template>
                        <template x-if="files[index].type.includes('application/') || files[index].type === ''">
                            <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </template>
                        <template x-if="files[index].type.includes('image/')">
                            <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                x-bind:src="loadFile(files[index])" />
                        </template>
                        <template x-if="files[index].type.includes('video/')">
                            <video
                                class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                            </video>
                        </template>
    
                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                            <span class="w-full font-bold text-gray-900 truncate"
                                x-text="files[index].name">Loading</span>
                            <span class="text-xs text-gray-900" x-text="humanFileSize(files[index].size)">...</span>
                        </div>
    
                        <div class="absolute inset-0 z-40 transition-colors duration-300" @dragenter="dragenter($event)"
                            @dragleave="fileDropping = null"
                            :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>
    
    </div>

    <div class="md:flex md:items-center">
      <div class="md:w-1/3">
        <button value="save" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
          Create
        </button>
      </div>
      <div class="md:w-2/3"></div>
    </div>

  </form>

<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
<script>
    function dropdown() {
        return {
            options: [],
            selected: [],
            show: false,
            
            open() {  this.show = true; },
            close() { this.show = false },
            isOpen() {  return this.show === true },
            select(index, event) {
                if (!this.options[index].selected) {
                    this.options[index].selected = true;
                    this.options[index].element = event.target;
                    this.selected.push(index);
                } else {
                    this.selected.splice(this.selected.lastIndexOf(index), 1);
                    this.options[index].selected = false
                }
            },
            remove(index, option) {
                this.options[option].selected = false;
                this.selected.splice(index, 1);
            },
            loadOptions() {
                const options = document.getElementById('select').options;
                for (let i = 0; i < options.length; i++) {
                    this.options.push({
                        value: options[i].value,
                        text: options[i].innerText,
                        selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                    });
                }
            },
            selectedValues(){
                return this.selected.map((option)=>{
                    return this.options[option].value;
                })
            }
        }
    }
</script>
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
<script src="https://unpkg.com/create-file-list"></script>
<script>
    function dataFileDnD() {
        return {
            files: [],
            fileDragging: null,
            fileDropping: null,
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            remove(index) {
                let files = [...this.files];
                files.splice(index, 1);

                this.files = createFileList(files);
            },
            drop(e) {
                let removed, add;
                let files = [...this.files];

                removed = files.splice(this.fileDragging, 1);
                files.splice(this.fileDropping, 0, ...removed);

                this.files = createFileList(files);

                this.fileDropping = null;
                this.fileDragging = null;
            },
            dragenter(e) {
                let targetElem = e.target.closest("[draggable]");

                this.fileDropping = targetElem.getAttribute("data-index");
            },
            dragstart(e) {
                this.fileDragging = e.target
                    .closest("[draggable]")
                    .getAttribute("data-index");
                e.dataTransfer.effectAllowed = "move";
            },
            loadFile(file) {
                const preview = document.querySelectorAll(".preview");
                const blobUrl = URL.createObjectURL(file);

                preview.forEach(elem => {
                    elem.onload = () => {
                        URL.revokeObjectURL(elem.src); // free memory
                    };
                });

                return blobUrl;
            },
            addFiles(e) {
                const files = createFileList([...this.files], [...e.target.files]);
                this.files = files;
                this.form.formData.files = [...files];
            }
        };
    }
</script>
@endsection
@extends('dashboard.base')

@section('body')

<!-- component -->
<form class="w-full mx-auto pt-10 max-w-lg" action="{{ route('categories.update' , $category) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-password">
            Category Name
          </label>
          <input name="name" value="{{ $category ->name }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
          
          @if($errors -> has('name'))

            <p class="text-red-600 text-xs italic">{{ $errors -> first('name') }}</p>
 
          @endif

        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="type">
            Parent Category
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
              <select name="parent_id" class="rounded border-2 border-teal-700 text-gray-600 h-14 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                @foreach ($categories as $cat)

                @if($category->parent_id != null){

                    @if($cat->name == $category->category->name)
                    
                    <option selected value="{{ $cat -> id }}">{{ $cat -> name }}</option>

                @else

                    <option value="{{ $cat -> id }}">{{ $cat -> name }}</option>

                @endif

                }

                @else{

                    <option value="{{ $cat -> id }}">{{ $cat -> name }}</option>
                }
                
                @endif



            @endforeach
              </select>
          </div>
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

</div>


    
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
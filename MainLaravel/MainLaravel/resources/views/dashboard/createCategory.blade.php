@extends('dashboard.base')

@section('body')
<form class="container max-w-full mx-auto md:py-20" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="max-w-sm mx-auto px-6">
            <div  class="relative flex flex-wrap">
                <div class="w-full relative">
                    <div>
                        <div class="text-center font-semibold text-black">
                            New Category ?
                        </div>
                        <div class="text-center font-base text-black">
                        Add Your Category Here
                        </div>
                        <div class="mt-3">
                            <div class="mx-auto max-w-lg ">
                                <div class="py-1" style="margin-bottom: 2em">
                                    <span class="px-1 text-sm text-gray-600">Category Name</span>
                                    <input name="name" placeholder="" type="text"
                                        class="text-md block px-3 py-2 rounded-lg w-full
                    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                                    @if($errors -> has('name'))

                                        <p class="text-red-600 text-xs italic">{{ $errors -> first('name') }}</p>

                                    @endif
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-4">
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
                                          <select name="parent_id" style="margin-bottom: 2em" class="rounded border-2 border-teal-700 text-gray-600 h-14 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                              @foreach ($categories as $category)
                                              
                                                  <option value="{{ $category ->id }}">{{ $category ->name }}</option>
                                  
                                              @endforeach
                                          </select>
                                      </div>
                            
                                <button class="text-lg font-semibold
                bg-gray-800 w-full text-white rounded-lg
                px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                                    Submit
                                </button>
                            </div>
                        </div>


                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

</form>
@endsection

@section('script')
<script src="https://unpkg.com/create-file-list"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
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
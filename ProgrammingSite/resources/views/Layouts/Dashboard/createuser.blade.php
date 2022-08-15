<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include("Layouts.Dashboard.dashboardlinks")
</head>
<body style="background-color: #2b323c">
    <div style="position: relative">
        <div style="width: 25%;position: absolute;">
            @include('Layouts.Dashboard.dashboard')
        </div>
        <form style="width: 75%;position: absolute;left: 300;" class="md:py-20" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="max-w-sm mx-auto px-6">
                    <div class="relative flex flex-wrap">
                        <div class="w-full relative">
                            <div>
                                <div class="text-center font-semibold text-white">
                                    New User ?
                                </div>
                                <div class="text-center font-base text-white">
                                Add Your User Here
                                </div>
                                <div class="mt-3">
                                    <div class="mx-auto max-w-lg ">
                                        <div class="py-1">
                                            <span class="px-1 text-sm text-white">Full Name</span>
                                            <input name="name" placeholder="" type="text"
                                                class="text-black block px-3 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-black shadow-md focus:placeholder-black focus:bg-white focus:border-gray-600 focus:outline-none">
                                            @if($errors -> has('name'))
        
                                                <p class="text-red-600 text-xs italic">{{ $errors -> first('name') }}</p>
        
                                            @endif
                                        </div>
                                        <div class="py-1">
                                            <span class="px-1 text-sm text-white">Email</span>
                                            <input name="email" placeholder="" type="email" x-model="password"
                                                class="text-black block px-3 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-black shadow-md focus:placeholder-black focus:bg-white focus:border-gray-600 focus:outline-none">
                                            @if($errors -> has('email'))
        
                                                <p class="text-red-600 text-xs italic">{{ $errors -> first('email') }}</p>
                                
                                            @endif
                                        </div>
                                        <div class="py-1" style="display: flex;justify-content: space-between">
                                            <div class="mr-1">
                                                <span class="px-1 text-sm text-white">Phone</span>
                                                <input name="phone" placeholder="" type="phone"
                                                    class="text-black block px-3 py-2 rounded-lg w-full
                                bg-white border-2 border-gray-300 placeholder-black shadow-md focus:placeholder-black focus:bg-white focus:border-gray-600 focus:outline-none">
                                                @if($errors -> has('phone'))
        
                                                    <p class="text-red-600 text-xs italic">{{ $errors -> first('phone') }}</p>
        
                                                @endif
                                            </div>
        
                                            <div class="ml-1">
                                                <span class="px-1 text-sm text-white">Password : (Min:8)</span>
                                                <input name="password" placeholder="" type="password"
                                                    class="text-black block px-3 py-2 rounded-lg w-full
                                bg-white border-2 border-gray-300 placeholder-black shadow-md focus:placeholder-black focus:bg-white focus:border-gray-600 focus:outline-none">
                                                @if($errors -> has('password'))
        
                                                    <p class="text-red-600 text-xs italic">{{ $errors -> first('password') }}</p>
        
                                                @endif
                                            </div>
                                        </div>
                                        @role('Admin')
                                            <div class="flex flex-wrap -mx-3 mb-4">
                                                <div class="w-full px-3">
                                                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="type">
                                                    User Role
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
                                                    <select name="role" style="margin-bottom: 2em" class="rounded border-2 border-teal-700 text-gray-600 h-14 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                                        @foreach ($allRoles as $role)
                                                            @if($role != 'Admin')
                                                                <option value="{{ $role }}">{{ $role }}</option>
                                                            @endif
                                            
                                                        @endforeach
                                                    </select>
                                                </div>
                                        @elserole('CEO')

                                        <div class="flex flex-wrap -mx-3 mb-4">
                                            <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="type">
                                                User Role
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
                                                <select name="role" style="margin-bottom: 2em" class="rounded border-2 border-teal-700 text-gray-600 h-14 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                                    
                                                    @foreach ($allRoles as $role)
                                                        @if($role != 'Admin' && $role != 'CEO')
                                                            <option value="{{ $role }}">{{ $role }}</option>
                                                        @endif
                                                    @endforeach                                     
                                                </select>
                                            </div>        
                                        @endrole
        
        
                                        <button class="text-lg font-semibold
                        bg-gray-900 w-full text-white rounded-lg
                        px-6 py-3 block shadow-xl hover:text-white hover:bg-black transition duration-150 ease-in-out">
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
    </div>
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
</body>
</html>
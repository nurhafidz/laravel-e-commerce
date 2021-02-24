@extends('layouts.app')

@section('content')
    
<section class="text-gray-700 body-font container mx-auto">
    <div class="container px-5 py-24 mx-auto flex flex-wrap flex-col ">
        <div class="flex mx-auto flex-wrap mb-20 shadow-2xl">
            
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none bg-gray-100 border-indigo-500 text-indigo-500 tracking-wider" id="list1">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="7" r="4" />  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>STEP 1
            </a>
            
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list2">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />  <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />  <line x1="10" y1="9" x2="14" y2="9" />  <line x1="12" y1="7" x2="12" y2="11" />
                </svg>STEP 2
            </a>
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list3">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>STEP 3
            </a>
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list4">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>STEP 4
            </a>
            
        </div>
        <form action="{{ route('detail.update',Auth::user()->id) }}" method="post">
            @csrf
            <div id="myDIV1" >
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <img class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                            <div class="font-bold text-xl mb-2">Gender</div>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-red-500">{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="flex flex-wrap -mx-1 overflow-hidden">
                                <div class="my-1 px-1 w-1/2 overflow-hidden">
                                    <label for="gender1">
                                    <input type="radio" id="gender1" value="P" name="jenis_kelamin" class="checked:bg-gray-900 checked:border-transparent">
                                    Perempuan
                                    </label>
                                </div>
                                <div class="my-1 px-1 w-1/2 overflow-hidden">
                                    <label for="gender2">
                                    <input type="radio" id="gender2" value="L" name="jenis_kelamin" class="checked:bg-gray-900 checked:border-transparent">
                                    Laki-laki
                                    </label>
                                </div>
                            </div>
                            <div id="demo"></div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction1()">next</a>
                </div>
            </div >
            <div id="myDIV2" class="hidden">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <img class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                            {{-- <div class="font-bold text-xl mb-2">Tempat </div> --}}
                            <div class="flex flex-wrap -mx-2 overflow-hidden">

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    @error('tmp_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="font-bold text-xl mb-2">Tempat lahir</div>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tmp_lahir') is-invalid @enderror" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat lahir" value="{{ old('tmp_lahir') }}">
                                    
                                </div>

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="font-bold text-xl mb-2">Tanggal lahir</div>
                                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal lahir" value="{{ old('tgl_lahir') }}"> 
                                </div>

                            </div>
                            <p id="demo2"></p>
                            
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction1()">back</a>
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction2()">next</a>
                </div>
            </div>
            <div id="myDIV3" class="hidden">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <img class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                            <div class="font-bold text-xl mb-2">Alamat</div>
                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Provinsi</div>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2 js-states form-control" name="province" id="province">
                                        <option value="">Provinsi</option>
                                        @foreach ($province as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kota / Kabupaten</div>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2" name="city" id="city">
                                        <option value="">Kota / Kabupaten</option>
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kecamatan</div>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2" name="district" id="district">
                                        <option value="">kecamatan</option>
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kode Post</div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kode') is-invalid @enderror" name="kode" id="kode" placeholder="Kode pos" value="{{ old('kode') }}">
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Alamat lengkap</div>
                                    <textarea class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full  border shadow rounded leading-tight focus:outline-none focus:shadow-outline  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" type="text" placeholder="Alamat lengkap" value="{{ old('alamat') }}" required></textarea>
                                    <div class="mt-5" id="demo3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction2()">back</a>
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction3()">next</a>
                </div>
            </div>
            <div id="myDIV4" class="hidden">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            
                            <div class="font-bold text-xl mb-2">Eula</div>
                            <div class="overflow-auto h-56">
                                <p><strong>End User License Agreement for OMNIKEY DRIVERS and SOFTWARE</strong></p>
IMPORTANT - CAREFULLY READ ALL THE TERMS AND CONDITIONS OF THIS END USER LICENSE AGREEMENT FOR OMNIKEY DRIVERS and SOFTWARE (THIS "AGREEMENT") BEFORE INSTALLING THE OMNIKEY DRIVERS and SOFTWARE AND ACCOMPANYING USER DOCUMENTATION (THE "SOFTWARE"). BY CLICKING ìI ACCEPT,î OR PROCEEDING WITH THE INSTALLATION OF THE SOFTWARE, OR USING THE SOFTWARE YOU ("YOU") ARE INDICATING THAT YOU HAVE READ, UNDERSTAND AND ACCEPT THIS AGREEMENT, AND THAT YOU AGREE TO BE BOUND BY ITS TERMS. IFYOU DO NOT AGREE WITH ALL OF THE TERMS OF THIS AGREEMENT, DO NOT INSTALL, COPY OR OTHERWISE USE THE SOFTWARE, CLICK ON THE "I DISAGREE" BUTTON AND THE INSTALLATION PROCESS FOR THE SOFTWARE WILL NOT CONTINUE AND YOU WILL NOT BE ABLE TO USE THE SOFTWARE.
1. Software License.
(a) License Grant. Subject to Your compliance with the terms and conditions of this Agreement, during the term of this Agreement, HID Global Corporation ("HID") grants You a personal, non-exclusive, non-transferable, non-sublicensable, limited license to install the Software, in object code form only, on Your networked or standalone computers and to access and use the Software internally for Your benefit and solely in conjunction with OMNIKEY brand reader devices purchased from HID or an authorized reseller. If You are a value added reseller, You may install, access and use the Software on Your networked or standalone computers and systems that You provide to Your end customers provided that You do not remove this Agreement from the Software and You require Your end customers to agree to the terms of this Agreement.
(b) Third Party Technologies. The Software may include or be bundled with other software programs licensed under different terms and/or licensed by a vendor other than HID. Use of any software programs accompanied by a separate license agreement is governed by that separate license agreement and not the terms of this Agreement, except that Sections 6(c) and 7 shall apply to the third party software. Please review the about box or readme file that accompanies the Software for the separate license notices and requirements for the third party software.HID is not responsible for any third party's software and shall have no liability for Your use of third party software.
2. License Restrictions. HID reserves all rights not expressly granted to You under this Agreement. You may not modify or alter the Software in any way or prepare any derivative works of the Software. You may not disassemble, decompile or reverse engineer the Software in order to obtain the source code, which is a trade secret of HID and/or its suppliers. You may not sell, rent, loan, lease, sublease, assign, or otherwise transfer or dispose of the Software. You shall not reproduce the Software or make any copies of the Software except for one single copy of Software for archival purposes only. You agree to reproduce any copyright and other proprietary right notices on any copies of the Software.
3. Ownership. No title to or ownership in the Software is transferred to You. You acknowledge and agree that HID and its suppliers own and retain all rights, title and interest in the Software and ownership of all intellectual property rights in the Software, including any derivative works, modifications, adaptations or copies thereof. The Software is the propriety product of HID and its suppliers and is protected by United States copyright laws and international provisions. You must treat the Software as any other copyrighted material You agree not to attempt in any way to obliterate, remove or destroy the trade secret or copyright notice in any copies of the Software.
4. Term and Termination.
(a) Term. This Agreement will be deemed to commence on the date that You click the "I Accept" button or the date that You install or use the Software, whichever is earlier, and will continue until terminated.
(b) Termination. You may terminate this Agreement by destroying the Software and all copies thereof. This Agreement will also terminate if You fail to comply with any term or provision of this Agreement. HID may terminate this Agreement immediately should the Software become, or in HID's opinion be likely to become, the subject of a claim of infringement of a patent, trade secret or copyright.
(c) Effect of Termination. Upon termination or expiration of this Agreement, You will immediately cease all use of the Software and Confidential Information. Within five (5) business days of the termination of this Agreement, You will remove all copies of the Software from Your systems and locations, in whole or in part, including all permitted archival and back-up copies and destroy the same. You shall not dispose of the Software as urban waste. You are responsible for properly destroying the Software in accordance with applicable laws. If You have questions regarding these obligations, You shall consult with local authorities for more information on proper destruction methods. An incorrect destruction of Software may cause damage to the environment and may be punishable by law. Sections 2,3, 4(c), 5, 6(c) and 7 through 12 shall survive the termination of this Agreement.
5. Confidentiality and Feedback.
(a) Obligations. For purposes of this Agreement, "Confidential Information" means: (i) business and technical information and any source code or binary code, which HID discloses to You related to the Software; (ii) Your Feedback based on Software; and (iii) the terms, conditions, and existence of this Agreement. You may not disclose or use Confidential Information, except for the purpose of performing Your obligations specified in this Agreement. You will protect the Confidential Information with the same degree of care, but not less than a reasonable degree of care, as You use to protect Your own Confidential Information. Your obligations regarding Confidential Information will expire no less than five (5) years from the date of receipt of the Confidential Information, except for HID source code which will be protected in perpetuity. You agree that Software contains HID trade secrets.
(b) Exceptions. Notwithstanding any provisions contained in this Agreement concerning nondisclosure and non-use of the Confidential Information, the nondisclosure obligations of Section 6.1 will not apply to any portion of Confidential Information that You can demonstrate in writing is: (i) now, or hereafter through no act or failure to act on the part of You becomes, generally known to the general public; (ii) known to You at the time of receiving the Confidential Information without an obligation of confidentiality; (iii) hereafter rightfully furnished to You by a third party without restriction on disclosure; or (iv) independently developed by You without any use of the Confidential Information. (c) Additional Restrictions. You must restrict access to Confidential Information to Your employees or contractors with a need for this access to perform their employment or contractual obligations and who have agreed in writing to be bound by a confidentiality obligation, which incorporates the protections and restrictions substantially as set forth in this Agreement.
(d) Feedback. If You provide HID with any feedback, suggestions, bug fixes, new features or functionality relating to the Software (ìFeedbackî), You hereby assign and agree to assign to HID all right, title and interest in and to such Feedback.
6. Limited Warranty and Disclaimer. HID warrants its Software in accordance with the following:
(a) Limited Warranty. HID warrants solely on its behalf and for Your benefit alone, that for a period of ninety (90) days from Your receipt of the Software (the "Warranty Period") optical media on which the Software is recorded shall be free from defects in materials and workmanship under normal use.
(b) Exclusive Remedy. HID's entire liability and Your exclusive remedy shall be the replacement of any media not meeting the limited warranty set forth above, provided it is returned to HID. Warranty claims must be received by HID within the Warranty Period. In the event of a warranty claim, You shall be responsible for the removal of the defective Software, shipping charges for return to HID, and installation of its replacement. Replaced Software and media, or any part thereof, shall become the property of HID and shall be returned to HID at Your expense.
(c) Warranty Disclaimer. THE EXPRESS WARRANTIES SET FORTH IN SECTION 6 OF THIS AGREEMENT ARE IN LIEU OF ALL OTHER WARRANTIES, EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION, ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT, AND TO THE EXTENT PERMITTED BY APPLICABLE LAW ALL SUCH OTHER WARRANTIES ARE HEREBY DISCLAIMED AND EXCLUDED BY HID AND ITS SUPPLIERS. Except as expressly provided herein, neither HID nor its suppliers warrant the performance or results of the Software, that the Software will meet Your requirements, or that the Software will run uninterrupted or error free. Some jurisdictions do not allow certain disclaimers and limitations of warranties, so portions of the above limitations may not apply to You. This limited warranty gives You specific rights and You may also have other rights which vary from state to state.
7. LIMITATION OF LIABILITY. IN NO EVENT SHALL HID OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY DAMAGES, INCLUDING, WITHOUT LIMITATION, ANY SPECIAL, INDIRECT, INCIDENTAL, PUNITIVE OR CONSEQUENTIAL DAMAGES, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THE SOFTWARE, INCLUDING WITHOUT LIMITATION, LOSS OF PROFITS, BUSINESS, DATA, GOODWILL, OR ANTICIPATED SAVINGS, EVEN IF ADVISED OF THE POSSIBILITY OF THOSE DAMAGES. IN NO EVENT WILL HID'S AGGREGATE LIABILITY FOR DIRECT DAMAGES TO PROPERTY OR PERSON (WHETHER IN ONE INSTANCE OR A SERIES OF INSTANCES) EXCEED THE AMOUNT OF FIVE HUNDRED DOLLARS ($500.00). In those jurisdictions that do not allow the exclusion or limitation of damages, HID's liability shall be limited or excluded to the maximum extent allowed within those jurisdictions. ADDITIONALLY, IN NO EVENT SHALL HID'S LICENSORS BE LIABLE FOR ANY DAMAGES OF ANY KIND.
8. U.S. Government Restricted Rights. If the Software is being acquired by or on behalf of the U.S. Government or by a U.S. Government prime contractor or subcontractor (at any tier), then the Government's rights in the Software shall be only as set forth in this Agreement; this is in accordance with 48 C.F.R. 227.7202-4 (for Department of Defense (DOD) acquisitions) and with 48 C.F.R. 2.101 and 12.212 (for non-DOD acquisitions).. Supplier is HID Global Corporation, 15370 Barranca Parkway, Irvine, CA 92683.
9. Export. Software and technical data delivered under this Agreement are subject to U.S. export control laws and may be subject to export or import regulations in other countries. You agree to comply strictly with all such laws and regulations and acknowledge that You have the responsibility to obtain such licenses to export, re-export or import as may be required after delivery to You.
10. Indemnification. You shall defend, indemnify, and hold HID, its officers, directors and employees, harmless from and against any and all claims, damages, losses, costs or other expenses (including reasonable attorneys' fees) that arise directly or indirectly out of Your willful misconduct or unauthorized use of the Software.
11. No Support. HID is under no obligation to provide You with updates or error corrections of the Software (collectively "Product Updates"). If HID, at its sole option, supplies Product Updates to You, the Product Updates will be considered part of Software, and subject to the terms of this Agreement.
12. Miscellaneous.
(a) Severability. If any provision of this Agreement is invalid or unenforceable under applicable law, then it shall be, to that extent, deemed omitted and the remaining provisions will continue in full force and effect.
(b) Governing Law and Venue. The validity and performance of this Agreement shall be governed by California law (without reference to choice of law principles), and applicable federal law. Any action, suit or proceeding relating to this Agreement shall be brought in the appropriate federal or state court location in Orange County, California, and You hereby consent to such jurisdiction. The United Nations Convention on Contracts for the International Sale of Goods shall not apply.
(c) Construction. This Agreement is deemed entered into in California, and shall be construed as to its fair meaning and not strictly for or against either party.
(d) Assignment. This Agreement will be binding upon and inure to the benefit of the parties hereto and their respective successors and assigns; provided, however, that You shall not assign any of Your rights, obligations, or privileges (by operation of law or otherwise) hereunder without the prior written consent of HID. Any attempted assignment in violation of this section will be void and of no effect.
(e) Waiver. No term or provision hereof shall be deemed waived and no breach consented to or excused, unless such waiver, consent or excuse shall be in writing and signed by the party claimed to have waived or consented. Should either party consent, waive, or excuse a breach by the other party, such shall not constitute consent to, waiver of, or excuse of any other different or subsequent breach whether or not of the same kind as the original breach.
(f) Attorneys' Fees. In the event of any legal action or proceeding relating to this Agreement, the prevailing party shall be entitled to recover its attorneys' fees in addition to any other relief granted.
(g) Entire Agreement; Modification. This Agreement sets forth the entire understanding and agreement between You and HID and supercedes all prior or contemporaneous agreements regarding its subject matter. This Agreement may be amended only in a writing signed by both parties.</div>
                                <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500 mt-5">
                                    <input type="checkbox" class="opacity-0 absolute" required>
                                    <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </div>
                                <div class="select-none">I accept the terms in the license agreement</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction3()">back</a>
                    <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" required>Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
<livewire:footer>
@endsection

@push('script')
<script>
function myFunction1() {
    var option=document.getElementsByName('jenis_kelamin');

    if (!(option[0].checked || option[1].checked)) {
        document.getElementById("demo").innerHTML = "<p class='text-red-600'>Pilih Jenis kelamin</p>";
        
        return false;
    }
    else{
        var x = document.getElementById("myDIV1");
        var y = document.getElementById("myDIV2");
        var v = document.getElementById("list2"); 
        var u = document.getElementById("list1"); 
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            v.classList.remove("bg-gray-100"); 
            v.classList.remove("border-indigo-500"); 
            v.classList.remove("text-indigo-500"); 
            u.classList.add("border-indigo-500"); 
            u.classList.add("text-indigo-500"); 
            
        } else {
            v.classList.add("bg-gray-100"); 
            v.classList.add("border-indigo-500"); 
            v.classList.add("text-indigo-500"); 
            u.classList.add("border-gray-200"); 
            u.classList.remove("border-indigo-500"); 
            u.classList.remove("text-indigo-500");
            x.style.display = "none";
            y.style.display = "block";
            
        }
    }
}
function myFunction2() {
    var tmp=document.getElementById('tmp_lahir');
    var tgl=document.getElementById('tgl_lahir');
    if(tmp.value == "" && tgl.value == ""){
        document.getElementById("demo2").innerHTML = "<p class='text-red-600'>Isi data</p>";
        return false;
    }
    if(tmp.value == ""){
        document.getElementById("demo2").innerHTML = "<p class='text-red-600'>Isi tempat lahir</p>";
        return false;
    }
    if(tgl.value == ""){
        document.getElementById("demo2").innerHTML = "<p class='text-red-600'>Isi tanggal lahir</p>";
        return false;
    }
    else{
        var x = document.getElementById("myDIV2");
        var y = document.getElementById("myDIV3");
        var v = document.getElementById("list2"); 
        var j = document.getElementById("list3"); 
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            j.classList.remove("bg-gray-100"); 
            j.classList.remove("border-indigo-500"); 
            j.classList.remove("text-indigo-500"); 
            v.classList.add("border-indigo-500"); 
            v.classList.add("text-indigo-500"); 
        } else {
            x.style.display = "none";
            y.style.display = "block";
            j.classList.add("bg-gray-100"); 
            j.classList.add("border-indigo-500"); 
            j.classList.add("text-indigo-500"); 
            v.classList.remove("border-indigo-500"); 
            v.classList.remove("text-indigo-500"); 
        }
    }
}
function myFunction3() {
    var a=document.getElementById('province');
    var b=document.getElementById('city');
    var c=document.getElementById('district');
    var d=document.getElementById('kode');
    var e=document.getElementById('alamat');
    if(a.value != "" && b.value != "" && c.value != "" && d.value != "" && e.value != ""){
        var x = document.getElementById("myDIV3");
        var y = document.getElementById("myDIV4");
        var v = document.getElementById("list3"); 
        var j = document.getElementById("list4"); 
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            j.classList.remove("bg-gray-100"); 
            j.classList.remove("border-indigo-500"); 
            j.classList.remove("text-indigo-500"); 
            v.classList.add("border-indigo-500"); 
            v.classList.add("text-indigo-500"); 
        } else {
            x.style.display = "none";
            y.style.display = "block";
            j.classList.add("bg-gray-100"); 
            j.classList.add("border-indigo-500"); 
            j.classList.add("text-indigo-500"); 
            v.classList.remove("border-indigo-500"); 
            v.classList.remove("text-indigo-500"); 
        }
    }
    if (!(a.value != "" || b.value != "" || c.value != "" || d.value != "" || e.value != "")) {
        document.getElementById("demo3").innerHTML = "<p class='text-red-600'>Isi data</p>";
        
        return false;
    }
    
    
}
function myFunction4() {
    var x = document.getElementById("myDIV4");
    var y = document.getElementById("myDIV5");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }
}

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<script type="text/javascript">
     //Select2
    

    //Ajax Wilayah 
    jQuery(document).ready(function ()
    {
        jQuery('select[name="province"]').on('change',function(){
            var provinceID = jQuery(this).val();
            
            if(provinceID)
            {
                jQuery.ajax({
                    url : '/detailuser/getcity/' +provinceID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    jQuery('select[name="city"]').empty();
                    jQuery.each(data, function(key,value){
                        $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    }
                });
            }
            else
            {
                $('select[name="city"]').empty();
            }
        });
    });
    jQuery(document).ready(function ()
    {
        jQuery('select[name="city"]').on('change',function(){
            var regencyID = jQuery(this).val();
            if(regencyID)
            {
                jQuery.ajax({
                    url : '/detailuser/getdistrict/' +regencyID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    jQuery('select[name="district"]').empty();
                    jQuery.each(data, function(key,value){
                        $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    }
                });
            }
            else
            {
                $('select[name="district"]').empty();
            }
        });
    });

    


</script>
@endpush
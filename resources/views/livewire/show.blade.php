<div class=" bg-white shadow-sm rounded p-4">
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3 lg:col-span-1">
            <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                <div class="flex items-center space-x-4">
                    
                    <div class="flex flex-col leading-tight">
                        <div class="text-2xl mt-1 flex items-center">
                        <span class="text-gray-700 mr-3">Chat</span>
                        
                    </div>
                    <div class="flex flex-col leading-tight">
                        <div class="text-2xl mt-1 flex items-center">
                        <span class="text-lg text-gray-600">Online</span>
                            <span class="text-green-500 m-1 mt-2">
                                <svg width="10" height="10">
                                    <circle cx="5" cy="5" r="5" fill="currentColor"></circle>
                                </svg>
                            </span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 p:2 justify-between flex flex-col h-screen">
                
                <!-- component -->

                
                @if ($users != null)
                <div class="flex flex-col space-y-4 p-3 overflow-x-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch " wire:poll="render">
                @forelse ($users as $user)
                
                @php
                    $not_seen = \App\Models\Message::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null;
                @endphp
                <a class="chat-message border-b-2 " href="{{ route('inbox.show', $user->id) }}">
                    <div class="flex items-end mb-2" wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                        
                        <div class="flex flex-col space-y-2 max-w-xs mx-2 order-2 items-start ">
                        <div><p class="px-6 py-4 rounded-lg inline-block font-semibold">{{ $user->first_name }}
                        @if(filled($not_seen))
                        {{ $not_seen->count() }}
                        @endif
                        </p></div>
                        </div>
                        <div class="flex relative w-12 h-12 bg-orange-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white"><img class="rounded-full" alt="A" src="https://randomuser.me/api/portraits/men/62.jpg">
                            @if($user->is_online)
                            <div class="bg-green-500 rounded-full w-3 h-3 absolute bottom-0 right-0"></div>
                            @endif
                        </div>
                    </div>
                </a>
                @empty
                <p>sorry</p>
                @endforelse
                </div>
            @endif
        </div>
    </div>
    <div class="col-span-3 lg:col-span-2">
        <div class="flex-1 p:2 justify-between flex flex-col h-screen">
            <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200 ">
                <div class="flex items-center space-x-4">
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                    <div class="flex flex-col leading-tight">
                        <div class="text-2xl mt-1 flex items-center">
                        <span class="text-gray-700 mr-3">{{ $sender->first_name }}</span>
                        <span class="text-green-500">
                            <svg width="10" height="10">
                                <circle cx="5" cy="5" r="5" fill="currentColor"></circle>
                            </svg>
                        </span>
                        </div>
                        <span class="text-lg text-gray-600">Junior Developer</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                    <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch" wire:poll.10ms="mount">
                
                    @if(filled($messages))
                        @foreach($messages as $message)
                            @if($message->user_id !== auth()->id())
                            <div class="chat-message received">
                                <div class="flex items-end">
                                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                        <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">{{ $message->message }}</span></div>
                                    </div>
                                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
                                </div>
                                <div class="flex items-end">
                                    <p class="text-xs italic">Sent {{ $message->created_at }}</p>
                                </div>
                            </div>
                            @else
                            <div class="chat-message sent">
                                <div class="flex items-end justify-end">
                                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                    <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">{{ $message->message }}</span></div>
                                    </div>
                                    <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
                                </div>
                                <div class="flex items-end justify-end">
                                <p class="text-xs italic">Sent {{ $message->created_at }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else
                        No messages to show
                    @endif
            
                
                
                
            {{-- @if(auth()->user()->is_admin == 1) --}}
            <form wire:submit.prevent="SendMessage">
                <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                    <div class="relative flex">

                        <textarea type="text" placeholder="Write Something" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-6 bg-gray-200 rounded-full py-3" name="" id="" cols="500" rows="1" style="overflow:hidden" wire:model="message" required></textarea>
                        <span class="absolute inset-y-0 right-0 flex items-center">
                            <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <button type="submit" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                </svg>
                            </button>
                        </span>
                        
                        <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                        </div>
                    </div>
                </div>
            </form>
            {{-- @endif --}}
        </div>
    </div>

</div>
    

    

<style>
            .scrollbar-w-2::-webkit-scrollbar {
            width: 0.25rem;
            height: 0.25rem;
            }

            .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity));
            }

            .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
            --bg-opacity: 1;
            background-color: #edf2f7;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
            }

            .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
            border-radius: 0.25rem;
            }
            </style>

<script>
	const el = document.getElementById('messages')
	el.scrollTop = el.scrollHeight
</script>
</div>

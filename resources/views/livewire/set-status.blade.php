            <div 
                x-data="{ isOpen: false }"
                x-init="
                    $wire.on('statusWasUpdated', () => {isOpen = false})
                    $wire.on('statusWasUpdatedError', () => {isOpen = false})
                    "
                class="relative">
                <button type="button"
                    @click="isOpen = !isOpen"
                    class="flex items-center justify-center w-36 h-11 text-sm bg-gray-200 font-semibold rounded-full border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-2 py-2 mt-2 md:mt-0" >
                    <span class="mr-2">Set Status</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>                                                 
                </button>
                <div 
                    x-cloak
                    x-show.transition.origin.top.left = "isOpen"
                    @click.away = "isOpen = false"
                    @keydown.excape.window="isOpen = false"
                    class="absolute z-20 w-64 md:w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                    <form wire:submit.prevent="setStatus" action="" class="space-y-4 px-4 py-6">
                        <div class="space-y-2">
                            <div>
                                <label class="flex items-center">
                                    <input type="radio" wire:model="status" id="radio-1" checked="" class="bg-gray-200 text-black border-none" value="1" name="radio-direct">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="radio" wire:model="status" id="radio-2" checked="" class="bg-gray-200 text-blue border-none" value="2" name="radio-direct">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="radio" wire:model="status" id="radio-3" checked="" class="bg-gray-200 text-yellow border-none" value="3" name="radio-direct">
                                    <span class="ml-2">In Progess</span>
                                </label>
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="radio" wire:model="status" id="radio-4" checked="" class="bg-gray-200 text-green border-none" value="4" name="radio-direct">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="radio" wire:model="status" id="radio-5" checked="" class="bg-gray-200 text-red border-none" value="5" name="radio-direct">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <textarea wire:model="comment" name="updated_comment" id="updated_comment" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-500 border-none px-4 py-2" placeholder="Add an update comment (optional)"></textarea>
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-full border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-2 py-2" >
                                <svg class="w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                </svg>                                  
                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-full border text-white border-blue hover:bg-blue-hover transition duration-150 ease-in px-2 py-2" >
                                <span class="ml-1">Update</span>
                            </button>
                        </div>
                        <div>
                            <label class="font-normal inline-flex items-center">
                                <input wire:model.live="notifyAllVoters" class="rounded bg-gray-200" type="checkbox" name="notify_voters">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>

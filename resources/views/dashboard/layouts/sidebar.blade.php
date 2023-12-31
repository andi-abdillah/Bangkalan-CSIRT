<div class="lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul class="flex flex-col gap-1.5 text-[.86rem] w-[18.5rem] my-auto lg:m-5 p-5 bg-neutral/60 backdrop-blur-md drop-shadow-lg rounded-[20px]"
            style="min-height: calc(100vh - 2.3rem);">
            <li
                class="{{ Request::is('dashboard') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                <a href="/dashboard" class="flex gap-4 w-full h-full px-4 py-2">
                    <div
                        class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard') ? 'icon-active' : '' }}">
                        <span class="material-symbols-rounded m-auto">
                            dashboard
                        </span>
                    </div>
                    <span class="self-center">
                        Dashboard
                    </span>
                </a>
            </li>
            <li
                class="{{ Request::is('dashboard/posts*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                <a href="/dashboard/posts" class="flex gap-4 w-full h-full px-4 py-2">
                    <div
                        class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/posts*') ? 'icon-active' : '' }}">
                        <span class="material-symbols-rounded m-auto">
                            post_add
                        </span>
                    </div>
                    <span class="self-center">
                        My Post
                    </span>
                </a>
            </li>
            @can('admin')
                <div class="divider">Administrator</div>
                <li
                    class="{{ Request::is('dashboard/categories*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                    <a href="/dashboard/categories" class="flex gap-4 w-full h-full px-4 py-2">
                        <div
                            class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/categories*') ? 'icon-active' : '' }}">
                            <span class="material-symbols-rounded m-auto">
                                category
                            </span>
                        </div>
                        <span class="self-center">
                            Post Categories
                        </span>
                    </a>
                </li>
                <li
                    class="{{ Request::is('dashboard/profils*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                    <a href="/dashboard/profils" class="flex gap-4 w-full h-full px-4 py-2">
                        <div
                            class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/profils*') ? 'icon-active' : '' }}">
                            <span class="material-symbols-rounded m-auto">
                                assignment_ind
                            </span>
                        </div>
                        <span class="self-center">
                            Profile
                        </span>
                    </a>
                </li>
                <li class="collapse collapse-arrow bg-neutral rounded-[12px]">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title">
                        Regulations
                    </div>
                    <div class="collapse-content flex flex-col gap-2">
                        <div
                            class="{{ Request::is('dashboard/regulation-categories*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                            <a href="/dashboard/regulation-categories" class="flex gap-4 w-full h-full px-4 py-2">
                                <div
                                    class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/regulation-categories*') ? 'icon-active' : '' }}">
                                    <span class="material-symbols-rounded m-auto">
                                        workspaces
                                    </span>
                                </div>
                                <span class="self-center">
                                    Regulation Categories
                                </span>
                            </a>
                        </div>
                        <div
                            class="{{ Request::is('dashboard/regulations*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                            <a href="/dashboard/regulations" class="flex gap-4 w-full h-full px-4 py-2">
                                <div
                                    class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/regulations*') ? 'icon-active' : '' }}">
                                    <span class="material-symbols-rounded m-auto">
                                        gavel
                                    </span>
                                </div>
                                <span class="self-center">
                                    Regulations
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="collapse collapse-arrow bg-neutral rounded-[12px]">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title">
                        Properties
                    </div>
                    <div class="collapse-content flex flex-col gap-2">
                        <div
                            class="{{ Request::is('dashboard/properties*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                            <a href="/dashboard/properties" class="flex gap-4 w-full h-full px-4 py-2">
                                <div
                                    class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/properties*') ? 'icon-active' : '' }}">
                                    <span class="material-symbols-rounded m-auto">
                                        photo_library
                                    </span>
                                </div>
                                <span class="self-center">
                                    Image Property
                                </span>
                            </a>
                        </div>
                        <div
                            class="{{ Request::is('dashboard/videos*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                            <a href="/dashboard/videos" class="flex gap-4 w-full h-full px-4 py-2">
                                <div
                                    class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/videos*') ? 'icon-active' : '' }}">
                                    <span class="material-symbols-rounded m-auto">
                                        movie
                                    </span>
                                </div>
                                <span class="self-center">
                                    Video Profile
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="collapse collapse-arrow bg-neutral rounded-[12px]">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title">
                        Files
                    </div>
                    <div class="collapse-content flex flex-col gap-2">
                        <div
                            class="{{ Request::is('dashboard/files*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                            <a href="/dashboard/files" class="flex gap-4 w-full h-full px-4 py-2">
                                <div
                                    class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/files*') ? 'icon-active' : '' }}">
                                    <span class="material-symbols-rounded m-auto">
                                        description
                                    </span>
                                </div>
                                <span class="self-center">
                                    File RFC2350
                                </span>
                            </a>
                        </div>
                        <div
                            class="{{ Request::is('dashboard/keys*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                            <a href="/dashboard/keys" class="flex gap-4 w-full h-full px-4 py-2">
                                <div
                                    class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/keys*') ? 'icon-active' : '' }}">
                                    <span class="material-symbols-rounded m-auto">
                                        vpn_key
                                    </span>
                                </div>
                                <span class="self-center">
                                    PGP Key
                                </span>
                            </a>
                        </div>
                        <div
                            class="{{ Request::is('dashboard/guidances*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                            <a href="/dashboard/guidances" class="flex gap-4 w-full h-full px-4 py-2">
                                <div
                                    class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/guidances*') ? 'icon-active' : '' }}">
                                    <span class="material-symbols-rounded m-auto">
                                        developer_guide
                                    </span>
                                </div>
                                <span class="self-center">
                                    Guidance File
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li
                    class="{{ Request::is('dashboard/footers*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                    <a href="/dashboard/footers" class="flex gap-4 w-full h-full px-4 py-2">
                        <div
                            class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/footers*') ? 'icon-active' : '' }}">
                            <span class="material-symbols-rounded m-auto">
                                barefoot
                            </span>
                        </div>
                        <span class="self-center">
                            Post Footer
                        </span>
                    </a>
                </li>
                <li
                    class="{{ Request::is('dashboard/services*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                    <a href="/dashboard/services" class="flex gap-4 w-full h-full px-4 py-2">
                        <div
                            class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/services*') ? 'icon-active' : '' }}">
                            <span class="material-symbols-rounded m-auto">
                                support_agent
                            </span>
                        </div>
                        <span class="self-center">
                            Service
                        </span>
                    </a>
                </li>
            @endcan
            @can('superadmin')
                <li
                    class="{{ Request::is('dashboard/users*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
                    <a href="/dashboard/users" class="flex gap-4 w-full h-full px-4 py-2">
                        <div
                            class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/users*') ? 'icon-active' : '' }}">
                            <span class="material-symbols-rounded m-auto">
                                group
                            </span>
                        </div>
                        <span class="self-center">
                            User Management
                        </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>

<div class="w-64 min-h-screen bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col justify-between">
    <div>
        <div class="px-6 py-4 text-lg font-bold text-gray-800 dark:text-gray-200">
            Admin Panel
        </div>

        <nav class="mt-4 space-y-1 px-2">
            <a href="{{ route('dashboard') }}"
               class="flex items-center px-4 py-2 rounded-md text-sm font-medium
                      {{ request()->routeIs('dashboard') ? 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                Dashboard
            </a>

            <a href="{{ route('dashboard.profile-portfolio.edit') }}"
               class="flex items-center px-4 py-2 rounded-md text-sm font-medium
                      {{ request()->routeIs('dashboard.profile-portfolio.*') ? 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                Profile
            </a>

            <a href="{{ route('dashboard.skills.index') }}"
               class="flex items-center px-4 py-2 rounded-md text-sm font-medium
                      {{ request()->routeIs('dashboard.skills.*') ? 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                Skills
            </a>

            <a href="{{ route('dashboard.experiences.index') }}"
               class="flex items-center px-4 py-2 rounded-md text-sm font-medium
                      {{ request()->routeIs('dashboard.experiences.*') ? 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                Experience
            </a>

            <a href="{{ route('dashboard.projects.index') }}"
               class="flex items-center px-4 py-2 rounded-md text-sm font-medium
                      {{ request()->routeIs('dashboard.projects.*') ? 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-200' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                Projects
            </a>
        </nav>
    </div>

    <div class="px-2 pb-6">
        <a href="{{ route('landing') }}" target="_blank"
           class="flex items-center justify-center gap-2 px-4 py-2 rounded-md text-sm font-medium
                  text-gray-600 dark:text-gray-300 border border-gray-300 dark:border-gray-600
                  hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
            Visit Website
        </a>
    </div>
</div>
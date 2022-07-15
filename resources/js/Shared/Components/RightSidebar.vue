<template>
  <div
    class="bg-gray-100 hidden md:flex flex-col items-center w-64 h-full border-l border-l-gray-200"
  >
    <div
      class="w-full h-8 border-b border-b-gray-200 flex items-center justify-center"
    >
      Component Settings
    </div>
    <div class="flex-grow pt-2 flex flex-col items-center w-full">
      <div
        class="flex flex-col w-full p-1 text-sm border-b border-dotted border-b-gray-200"
      >
        <div class="w-full">
          html&nbsp;&raquo;&nbsp;<span class="font-medium">lang</span>
        </div>
        <div class="w-full flex justify-between space-x-1">
          <input
            type="text"
            class="flex-grow text-sm py-0 px-1 border border-gray-500"
          />
          <div class="w-8"></div>
        </div>
      </div>
      <div
        class="flex flex-col w-full p-1 text-sm border-b border-dotted border-b-gray-200"
      >
        <div class="w-full">
          head&nbsp;&raquo;&nbsp;meta&nbsp;&raquo;&nbsp;<span
            class="font-medium"
            >charset</span
          >
        </div>
        <div class="w-full flex justify-between space-x-1">
          <input
            type="text"
            class="flex-grow text-sm py-0 px-1 border border-gray-500"
          />
          <div class="w-8"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup></script>

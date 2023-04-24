<template>
    <h1 class="text-3xl font-bold mb-6 text-center">Data Viewer</h1>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Street & Number
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Postcode
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        City
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Message
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="(person, index) in people" :key="index" @click="selectedPerson = person"
                    class="cursor-pointer hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ person.Name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ person.Email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ person.StreetNumber }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ person.Postcode }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ person.City }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ person.Message }}</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Selected Person Details -->
    <div class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        v-if="selectedPerson">
        <div class="bg-white rounded-lg overflow-hidden" style="max-width: 400px;">
            <div class="bg-blue-200 py-4 px-6">
                <div class="font-bold text-lg mb-2">{{ selectedPerson.Name }}</div>
            </div>
            <div class="px-6 py-4">
                <p class="text-gray-700 text-base mb-2" style="word-wrap: break-word;"><p class="font-bold font-medium text-gray-900">Email:</p> {{ selectedPerson.Email }}</p>
                <p class="text-gray-700 text-base mb-2" style="word-wrap: break-word;"><p class="font-bold font-medium text-gray-900">Street & Number: </p>{{ selectedPerson.StreetNumber }}</p>
                <p class="text-gray-700 text-base mb-2" style="word-wrap: break-word;"><p class="font-bold font-medium text-gray-900">Postcode: </p>{{ selectedPerson.Postcode }}</p>
                <p class="text-gray-700 text-base mb-2" style="word-wrap: break-word;"><p class="font-bold font-medium text-gray-900">City: </p>{{ selectedPerson.City }}</p>
                <p class="text-gray-700 text-base mb-2" style="word-wrap: break-word;"><p class="font-bold font-medium text-gray-900">Message: </p>{{ selectedPerson.Message }}</p>
            </div>
            <div class="px-6 py-4 bg-gray-100 text-right">
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-400"
                    @click="selectedPerson = null">Close</button>
            </div>
        </div>
    </div>
</template>
  
<script>
export default {
  data() {
    return {
      people: [],
      selectedPerson: null
    }
  },
  mounted() {
    fetch('http://localhost:8000/api/getformdata')
      .then(response => response.json())
      .then(data => {
        this.people = data
      })
      .catch(error => {
        console.error(error)
      })
  },
  methods: {
  }
}
</script>
<style></style>
  
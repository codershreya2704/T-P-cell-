// Add event listener to join discussion button
const joinBtn = document.querySelector('.btn');
joinBtn.addEventListener('click', () => {
  alert('You have joined the discussion!');
});
const form = document.querySelector('form');
const reviewsDiv = document.querySelector('#reviews');

// Add event listener to form submit
form.addEventListener('submit', (event) => {
  event.preventDefault();
  
  const companyName = form.elements['company-name'].value;
  const jobTitle = form.elements['job-title'].value;
  const reviewText = form.elements['review'].value;
  const rating = form.elements['rating'].value;
  
  const review = createReviewElement(companyName, jobTitle, reviewText, rating);
  reviewsDiv.appendChild(review);
  
  // Clear form fields
  form.reset();
});

// Create review element
function createReviewElement(companyName, jobTitle, reviewText, rating) {
  const review = document}

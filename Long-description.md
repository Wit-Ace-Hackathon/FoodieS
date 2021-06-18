Foodies is our initiative to reduce food wastage and help the needy. We have developed a website to help the society which allows the people to connect with those in need and provide them food. It is a platform for people to share the extra food items or leftovers from restaurants and different places at low/no rate.
The detailed description of the website and its various components is as follows :

●	LOGIN SYSTEM 

❖	 Sign-up form
Collects the data of the user and stores it in our MySQL database. Every user is identified by his / her unique username. We have used php to upload the user data and store it in our database.

❖	 Sign-in form
We use a SQL query to select the users’ data from the database which have a unique username and password given by the user at the time of sign-up. If the data matches from our back-end, then the user is logged-in successfully. If a user enters invalid credentials, a message is displayed stating, “Invalid Credentials!!”.
On successful login, the user visits the main page of the website.

●	NAVIGATION BAR
Navigation Bar of the website contains the website name “FoodieS” on the left and various navigation components on the right. The navigation components include - HOME, SELLER, BUYER, BLOGS, CONTACT US, LOGOUT.

❖	HOME : It takes the user to the top of the main page of the website.

❖	SELLER : It takes the user to the food detail form in the website which can be used to enter the details of the food items which the user wants to sell.

❖	BUYER : It takes the user to the search bar where the user can search for the nearby food items (if available) using the pincode.

❖	CONTACT US : It takes the user to the contact us option through which the user can email their feedback/issues.

❖	LOGOUT : This section ends the session of the user which was started during login. After which the website no longer recognises the user and therefore prevents him/her from accessing the home page further.

●	CAROUSEL
It is made using the bootstrap framework and displays the purpose of the website using images and quotes.

●	SEARCH BAR
Search Bar is made to help the user search his nearby places and check if there is any food item available. The search bar takes the pin code of the user as input after which a sql query selects all the available food results with the given pin code from the database and the result is displayed on cards and arranged using a grid view. 

●	FOOD DETAIL FORM
The user who wishes to provide details of the extra food which they want to sell can fill this form. This form uploads all the data to a database table using a php script. The uploaded data will be visible in the search results. 

●	BLOGS
Blogs section of the website contains three blogs on different purposes of sustainability. On clicking “Read more”, the user visits the Blog Page. 
The Blog WebPage contains detailed blogs on - “Alternatives to Plastic” , “How Not To Waste Food” , “Sustainable Development”. 

●	CONTACT US
If a user has any query, he/she can contact us through email by clicking on the ‘CONTACT US’ button. 

●	FOOTER
The footer contains links of other social media platforms through which the user can get connected to the platform and the initiative.  

●	CLOUD ASSISTANT
We have used the WATSON ASSISTANT from the IBM cloud services. If a user is facing an issue, he/she can ask a question to the assistant and get his query resolved. We have trained the assistant with some basic queries like “What is this website about?”, ”I am having an issue”, etc.

●	CONCLUSION
Food wastage is a major problem in the world. Thousands of people go to sleep without having food just because they do not have the money. On the other hand, we see a lot of excessive food getting wasted. Therefore, we have come up with a solution through which we tried to make that extra food available to other people at affordable prices.

●	RESULT
With our zeal to help the society, we have completed the implementation of our concept and successfully developed our website. Both, front-end and back-end development of the website is successfully completed. All the group members have strived hard to take a step towards the betterment of the society.

●	ACKNOWLEDGEMENT

We would like to thank the WIT-Ace hackathon team and IBM who provided us with this opportunity, through which we were able to showcase our technical skills and give our contribution in this huge initiative of creating a sustainable tomorrow.

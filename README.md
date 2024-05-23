servername = "localhost"; 
username = "audile"; 
password = "222009350"; 
database = "recruitmentplatform";

Introduction
This document outlines the functionality required for a recruitment platform designed to streamline the hiring process for employers and provide a seamless experience for job seekers.

Project Structure
Recruitmentplatform/
│
├── Cascading Style Sheets: Css files.css
├── Hypertext Preprocessor: flies.php
├── Hypertext Markup Language: files. HTML
└── JavaScript index.js
                                                      Usage
Step 1: Set Up the Database
1. Log in to your MySQL database using a tool like phpMyAdmin, MySQL Workbench, or the MySQL command line.
2. Create a new database named `recruitmentplatform` (or any name of your choice).
Step 2: Configure the Database Connection
1. Update the db_connection.php file with your database connection details (Localhost, audile, 222009350, recruitmentplatform).
Step 3: Deploy the Files
1. Place all files (db_connection.php, contact.php, viewcandidateprofiles.php, index.html etc.) in the web root directory of your server (e.g., htdocs for XAMPP).
Step 4: Access the Form
1. Open your web browser and navigate to http: //localhost/index.html (or the appropriate URL based on your server setup).
2. Fill out the form and submit it.
Step 5: View Submitted Data
1. Data submitted through the form will be inserted into the contact_messages table.
2. You can view the submitted data by querying the contact_messages table in your database, or by developing additional pages to display the data, such as viewcandidateprofiles.php.
Recruitment Platform Functionality Document

 User Roles and Permissions

1. Job Seeker
- Registration and Login:
  - Create an account using email or social media (e.g., LinkedIn, Google).
  - Secure login with password recovery options.
-Profile Management:
  - Create and update a profile with personal information, resume, and cover letter.
  - Option to upload and parse resumes for automated profile completion.
- Job Search:
  - Search for jobs using various filters (location, industry, job type, salary range).
  - Save job searches and receive notifications for new job postings.
- Application Management:
  - Apply for jobs with a single click.
  - Track application status.
  - Receive messages and updates from employers.
-Job Alerts:
  - Set up email alerts for new job postings that match saved search criteria.
  
2. Employer
- Registration and Login:
  - Create an employer account.
  - Secure login with password recovery options.
- Company Profile:
  - Create and update a company profile with detailed information about the organization.
  - Option to showcase company culture and benefits.
- Job Posting Management:
  - Create and manage job postings.
  - Set job posting duration and visibility.
  - Add screening questions to job applications.
- Candidate Search:
  - Search for candidates using various filters (skills, experience, education).
  - Save candidate searches and receive notifications for new candidates.
- Application Management:
  - Review and manage applications.
  - Communicate with candidates through an internal messaging system.
  - Rate and comment on candidate profiles for internal review.
- Interview Scheduling:
  - Schedule interviews with candidates.
  - Send automated reminders and updates to candidates.
  
3. Administrator
- User Management:
  - Manage job seeker and employer accounts.
  - Approve or reject employer registrations.
  - Handle user reports and complaints.
- Platform Management:
  - Manage platform content (FAQs, blogs, guidelines).
  - Monitor platform activity and generate reports.
Job Posting and Application Review:
  - Review and approve job postings if needed.
  - Monitor job applications and interactions for compliance.
  
 Core Features

1. Dashboard
  - Overview of profile completeness.
  - Recent job applications and their status.
  - Suggested jobs based on profile and search history.
-  Dashboard:
  - Overview of active job postings.
  - Recent applications and their status.
  - Suggested candidates based on job postings.
2. Search Functionality
- Advanced Search:
  - Allow users to perform advanced searches with multiple criteria.
  - Include search filters like keywords, location, salary range, industry, and job type.
  
3. Messaging System
-Internal Messaging:
  - Secure messaging between employers and job seekers.
  - Email notifications for new messages.
  - Message templates for common communications.

4. Notifications and Alerts
Email Notifications:
  - For account activities, new messages, application updates, and job alerts.
- In-App Notifications:
  - Real-time updates for new messages, application status changes, and job alerts.

5. Analytics and Reporting
For Employers:
  - Job posting performance (views, applications).
  - Candidate pipeline statistics.
For Administrators:
  - Platform usage statistics.
  - User activity and engagement metrics.
  
6. Security Features
Data Protection:
  - Secure data storage and encryption.
  - Regular security audits and updates.
User Authentication:
  - Multi-factor authentication for added security.
 
.

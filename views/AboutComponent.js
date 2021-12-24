import React from 'react';
import { Breadcrumb, BreadcrumbItem, Card,CardTitle, CardBody, CardHeader, CardImg, CardSubtitle, CardText, Media } from 'reactstrap';
import { Link } from 'react-router-dom';

function RenderTeam({students,loading}) {
    var data = "";

          if (loading) {
            data =  <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

        }
        else {
            data = students.map((student) => {
            return (
              <div className="col-12 col-md-4">
                   
                   <Card className="m-3">
               <CardImg width="100%" src={student.image} alt={student.username} />
            <CardBody>
                <CardTitle>{student.name}</CardTitle>
            <CardSubtitle>{student.designation}</CardSubtitle> 
            <CardText>
            </CardText>
            </CardBody>
                    </Card>
                    </div>);
 
        });
    }

    return (
        <div className="container">
            <div className="row">
                    {data}
            </div>
        </div>
        
    )

}
function RenderInstructor({ instructors, loading }) {
    var data = "";

          if (loading) {
            data =  <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

        }
        else {
            data = instructors.map((instructor) => {
                return (
                    <React.Fragment>

                        <div className="col-12 col-md-4">
                         </div>
                   <div className="col-12 col-md-4">
                        <Card className="m-3">
                    <CardImg width="100%" src={instructor.image} alt={instructor.name} />
                 <CardBody>
                     <CardTitle>{instructor.name}</CardTitle>
                 <CardSubtitle>{instructor.designation}</CardSubtitle> 
                 <CardText>
                 </CardText>
                 </CardBody>
                         </Card>
                                <div className="col-12 col-md-4">
              
                         </div>
                        </div>
                          </React.Fragment>);
      
             });
    }

    return (
        <div className="container">
            <div className="row">
                    {data}
            </div>
        </div>
        
    )

}


function About(props) {
    
    return(
        <div className="container">
            <div className="row">
                <Breadcrumb>
                    <BreadcrumbItem><Link to="/home">Home</Link></BreadcrumbItem>
                    <BreadcrumbItem active>About Us</BreadcrumbItem>
                </Breadcrumb>
                <div className="col-12">
                    <h3>About Us</h3>
                    <hr />
                </div>                
            </div>
            <div className="row row-content">
                <div className="col-12 col-md-12">
                    <h2>Our Project</h2>
                    <p>This project is concerned with the analysis, design, development, implementation and evaluation of an e-learning system to provide a user friendly environment for prospective students to acquire knowledge at any educational level and to bridge the gap between teachers and students. This project is implement a crowd sourcing service with e-learning platform where student can enroll course by subscription and instructor can upload courses and also supporting stuff can help both instructor and student with their problems. Admin will manage whole system and take necessary steps.</p>
                </div>
                
                <div className="col-12">
                    <Card>
                        <CardBody className="bg-faded">
                            <blockquote className="blockquote">
                                <p className="mb-0">Education is the most powerful weapon which you can use to change the world.</p>
                                <footer className="blockquote-footer">Nelson Mandela,
                                <cite title="Source Title">Speech, Madison Park High School, Boston, 23 June 1990,Reported in various forms</cite>
                                </footer>
                            </blockquote>
                        </CardBody>
                    </Card>
                </div>
            </div>
            <div className="col-12">
                    <h2>Our Team</h2>
                <RenderInstructor instructors={props.instructors} loading={props.loading}/>
                <RenderTeam students={props.students} loading={props.loading}/>
                </div>
            </div>
     
    );
}

export default About;    
import axios from 'axios'
import React from 'react'
import { Card, Col, Row } from 'react-bootstrap'
import { useNavigate } from 'react-router-dom'
import { Header, SecureApiUrl } from '../../../Context'

export default function EcommerceCategories(props) {
    const navigate =  useNavigate()
    const [page,setPage] = React.useState({})
    
    const handleGetStartUpData = async () => {
        await axios.get(SecureApiUrl(`get-ecommerce-categories`),{headers : Header()})
        .then(function(response) {
            let info = response.data

            if(info.deny){
                navigate(-1)
                setTimeout(() => {
                    props.onAccessDeny(info.deny)
                },100)
                return false
            }
            setPage(info.page)
        })
        .catch(function (error) {
            if(error.request && error.request.status == 401){
              location.reload()
            }
        })
    }
    
    React.useEffect(()=>{
        handleGetStartUpData()
    },[props])

    return (
        <React.Fragment>
            <Row>
                {page.can_save ? (
                    <Col sm={{ span: 12, order : 2 }} md={{ span: 4, order: 2 }}>
                        <Card>
                            <Card.Header className='outline-primary'>{page.form_card_title}</Card.Header>
                        </Card>
                    </Col>
                 ):(``)}
                 <Col sm={{span : 12, order : 1}} md={{ span : page.can_save ? 8 :12, order:1 }}>
                    <Card>
                        <Card.Header className='outline-primary'>{page.list_card_title}</Card.Header>
                    </Card>
                 </Col>
            </Row>
        </React.Fragment>
    )
}

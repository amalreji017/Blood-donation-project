import React, { Component } from 'react'
export default class SignUpps  extends Component {
  render() {
    return (
      <form>
        <h3>Sign Up for Hospital</h3>
        <div className="mb-3">
          <label>Hospital Name</label>
          <input
            type="text"
            className="form-control"
            placeholder="First name"
          />
        </div>
        <div className="mb-3">
          <label>Place</label>
          <input type="text" className="form-control" placeholder="Last name" />
        </div>  
        <div className="mb-3">
          <label>License/Registration Number</label>
          <input
            type="text"
            className="form-control"
            placeholder="Enter Number"
          />
        </div>
        <div className="mb-3">
          <label>Password</label>
          <input
            type="password"
            className="form-control"
            placeholder="Enter password"
          />
        </div>
        <div className="d-grid">
          <button type="submit" className="btn btn-primary">
            Sign Up
          </button>
        </div>
        <p className="forgot-password text-right">
          Already registered <a href="/sign-inh">sign in?</a>
        </p>
      </form>
    )
  }
}
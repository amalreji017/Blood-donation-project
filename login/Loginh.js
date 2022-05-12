import React, { Component } from 'react'
export default class Loginh extends Component {
  render() {
    return (
      <form>
        <h3>Sign In  for Hospital</h3>
        <div className="mb-3">
          <label>License/Registration</label>
          <input
            type="text"
            className="form-control"
            placeholder="Enter number"
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
        <div className="mb-3">
          <div className="custom-control custom-checkbox">
            <input
              type="checkbox"
              className="custom-control-input"
              id="customCheck1"
            />
            <label className="custom-control-label" htmlFor="customCheck1">
              Remember me
            </label>
          </div>
        </div>
        <div className="d-grid">
          <button type="submit" className="btn btn-primary">
            Submit
          </button>
        </div>
        <p className="forgot-password text-right">
          Forgot <a href="#">password?</a>
        </p>
        <p className="forgot-password text-right">
          Not registered?<a href="/sign-uph">sign up</a>
        </p>
      </form>
    )
  }
}